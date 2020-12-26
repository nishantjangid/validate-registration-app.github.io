<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function registration(Request $req)
    {
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

        // $fileName = time().'_'.$req->file('profile')->getClientOriginalName();
        // $filePath = $req->file('profile')->storeAs('profiles', $fileName, 'public');
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
        // $data = true;
        $msg = "Registered Successfully";
        $req->session()->flash('alertRight',$msg);

 
        }

        return redirect('/registration');
        // return response()->json($data);
    }

    public function login(Request $req)
    {     
        $req->validate([
            'email'=>'required|email:rfc,dns',
            'password'=>'required'
        ]);
        $Employee = Employee::where(['email'=>$req->email])->first();
        if(!$Employee || !Hash::check($req->password,$Employee->password))
        {   
            $msg = "Email ".$req->input('email')." or Password does not Matched";            
            $req->session()->flash('alertWrong',$msg);                                      
            return redirect('/login');
            // $data = false;
            // return response()->json($data);
        }
        else{    

            $inactiveEmpCount = Employee::where(['email'=>$req->email,'status'=>'Inactive'])->count();

            //check if employee is inactive
            if($inactiveEmpCount==1){
                $msg = "Your account is inactive please contact with admin";
                $req->session()->flash('alertWrong',$msg);                                      
                return redirect('/login');
            }
            $req->session()->put('user',$Employee);
            return redirect('/');
        }
    }

    public function editForm()
    {
        $empId = Session::get('user')['id'];
        $employees = Employee::find($empId);

        return view('/edit-profile',['data' => $employees]);
    }
 
    function updateForm(Request $req)
    {
        $empId = Session::get('user')['id'];
        //validate the fields
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

            $data = Employee::where('id',$empId)
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
            return redirect('/edit-profile');
        }else{

            $data = Employee::where('id',$empId)
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
            return redirect('/edit-profile');            
        }

        // return response()->json($data);
    }

    function forgotPassword(Request $req)
    {
        $req->validate([
            'email'=>'required|email:rfc,dns',
            'password'=>'required | min:7'
        ]);
        $count =  Employee::where('email',$req->email)->count();
        if($count == 1)
        {
            $password = Hash::make($req->password);
            Employee::where('email',$req->email)
            ->update(['password'=>$password]);    
            $msg = "Password update successfully Please login";
            $req->session()->flash('alertRight',$msg);            
            // $data = true;
            // return response()->json($data);
            return redirect('/forgot-password');
        }
        else{
            $msg = "This Email ".$req->email." is not Registered";
            $req->session()->flash('alertWrong',$msg);  
            return redirect('/forgot-password');
            // $data = false;
            // return response()->json($data);
        }

    }

    function changePassword(Request $req)
    {
        $empId = Session::get('user')['id'];
        $emp = Employee::find($empId);

        $req->validate([
            'new_password'=>'required|min:7',
            'confirm_password'=>'required'
        ]);   
        
        if($req->new_password != $req->confirm_password){
            $req->session()->flash('passMatch',"New password and Confirm password does not match");
            return redirect('/change-password');  
        }else{
            if(!Hash::check($req->new_password, $emp->password))
            {
                $password = Hash::make($req->new_password);
                Employee::where('id',$empId)
                ->update(['password'=>$password]);

                $msg = "Update Successfully";
                $req->session()->flash('alertRight',$msg);
                return redirect('/change-password'); 
                
            }else{
                $req->session()->flash('alertWrong',"The New Password you entered is the same as your Old Password please enter different password");
                return redirect('/change-password');                 
            }                      
        }

        // if(!Hash::check($req->password, $emp->password))
        // {
        //     $password = Hash::make($req->password);
        //     Employee::where('id',$empId)
        //     ->update(['password'=>$password]);
        //     $data = true;
        // }else{
        //     $data = false;
        // }
        // return response()->json($data);
    }
}
