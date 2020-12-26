<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //


    //show details on dashboard
    function DashboardDetail(){

        $totalEmployee = Employee::all()->count();
        return view('admin/dashboard',['totalEmployee'=>$totalEmployee]);
    }

    function adminlogin(Request $req){

        $req->validate([
            'email'=>'required|email:rfc,dns',
            'password'=>'required'
        ]);

        $admin = Admin::where(['email'=>$req->email])->first();
        if(!$admin || !Hash::check($req->password,$admin->password))
        {   
            $msg = $req->input('email');
            $req->session()->flash('alertWrong',$msg);                                      
            return redirect('/admin/login');
        }
        else{    
            $req->session()->put('admin',$admin);
            return redirect('/admin');
        }                
    }

    function viewEmployee(){
        $emp = DB::table('employees')->orderBy('id','desc')->get();

        return view('admin/dashboard',['data'=>$emp]);
    }

    function insertEmployee(Request $req){
        $req->validate([
            'name'=>'required|min:3',
            'email'=>'required|email:rfc,dns|unique:employees',
            'password'=>'required|min:7',
            'mobile'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:13|min:10|unique:employees',
            'gender'=>'required',
            'hobbies'=>'required',
            'country'=>'required',
            'address'=>'required|max:200',            
            'profile'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);  
        $count =  Employee::where('email',$req->email)->count();
        if($count>0)
        {
            // $data = false;
            $msg = "This Email ".$req->email." Already Registered";
            $req->session()->flash('alertWrong',$msg); 
        }else{

        $imageName = time().'.'.$req->profile->extension();  
        $req->profile->move(public_path('profiles'), $imageName);

        $emp = new Employee;
        $emp->name = $req->name;
        $emp->email = $req->email;
        $emp->password = Hash::make($req->password);
        $emp->mobile = $req->mobile;
        $emp->gender = $req->gender;
        $emp->hobbies = implode(",",$req->hobbies);
        $emp->country = $req->country;
        $emp->address = $req->address;        
        $emp->profile = $imageName;
        $emp->save();

        $msg = "Inserted Successfully";
        $req->session()->flash('alertRight',$msg);
        }              
        return redirect('/admin/view-employee');
    }

    //delete employee record
    function deleteEmployee($id){
        $emp = Employee::find($id);
        $emp->delete();
        $msg = "Record Deleted Successfully";
        session()->flash('alertRight',$msg);
        return redirect('/admin/view-employee');
    }

    function editForm($id){
        $emp = Employee::find($id);
        return view('/admin/edit-employee',['data'=>$emp]);
    }

    function editEmployee(Request $req){

        $req->validate([
            'name'=>'required|min:3',
            'email'=>"required|email:rfc,dns|unique:employees,email,$req->id",
            'mobile'=>"required|regex:/^([0-9\s\-\+\(\)]*)$/|max:13|min:10|unique:employees,mobile,$req->id",
            'gender'=>'required',
            'hobbies'=>'required',
            'country'=>'required',
            'address'=>'required|max:200',            
            'profile'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);   
        
        if($req->profile != ""){

            $imageName = time().'.'.$req->profile->extension();  
            $req->profile->move(public_path('profiles'), $imageName);

            $data = Employee::where('id',$req->id)
                ->update(['name'=>$req->name,
                'email'=>$req->email,
                'mobile'=>$req->mobile,
                'gender'=>$req->gender,
                'hobbies'=>implode(",",$req->hobbies),
                'country'=>$req->country,
                'address'=>$req->address,                
                'profile'=>$imageName
            ]);

            $Employee = Employee::where(['email'=>$req->email])->first();
            $req->session()->put('user',$Employee);
            
            $msg = "Update Successfully";
            $req->session()->flash('alertRight',$msg); 
            return redirect('/admin/view-employee');
        }else{

            $data = Employee::where('id',$req->id)
                ->update(['name'=>$req->name,
                'email'=>$req->email,
                'mobile'=>$req->mobile,
                'gender'=>$req->gender,
                'hobbies'=>implode(",",$req->hobbies),
                'country'=>$req->country,
                'address'=>$req->address                
            ]);

            $Employee = Employee::where(['email'=>$req->email])->first();
            $req->session()->put('user',$Employee);
            
            $msg = "Update Successfully";
            $req->session()->flash('alertRight',$msg); 
            return redirect('admin/view-employee');            
        }        
    }

    function resetPassword(Request $req){
        $count = Admin::where('email',$req->email)->count();
 
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 8);
        if($count>0){
            $details = [
                'title'=>'Mail from registration Website',
                'body'=>'Your reset password is -> '.$password
            ];
            \Mail::to($req->email)->send(new ForgetPasswordMail($details));

            //make new password encrypt
            $newPassword = Hash::make($password);
            Admin::where('email',$req->email)
                ->update(['password'=>$newPassword]);

            $msg = "Your password is successfully reset please Check your mail";
            $req->session()->flash('alertRight',$msg);
            return redirect('admin/forgot-password');

        }else{
            $msg = $req->email;
            $req->session()->flash('alertWrong',$msg);
            return redirect('/admin/forgot-password');
        }
    }

    function changeStatus($id, $status){
        $emp = Employee::where('id',$id)
        ->update(['status'=>$status]);
        Session::flash('alertRight', 'Employee Status Updated');
        return redirect('admin/view-employee');
    }
}
