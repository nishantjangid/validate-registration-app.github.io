@php
$i=0;    
@endphp
<div class="tableContainer">
    <div class="text-center py-3 font-weight-bold">
        <h3 class="font-weight-bold">View Employees</h3>
    </div>
    @if(session('alertRight'))
    <div class="alert alert-success alert-box alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('alertRight')}}</strong>.
    </div>
    @endif   
    @if(session('alertWrong'))
    <div class="alert alert-danger alert-box alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('alertWrong')}}</strong>.
    </div>
    @endif      
    <div class="tableArea" style="overflow-y: scroll">
        <table class="table table-stripped table-bordered" id="viewEmployee">
            <thead>
                <tr>
                    <td>S. No.:</td>
                    <td>Name:</td>
                    <td>E-mail:</td>
                    <td>Mobile:</td>
                    <td>Gender:</td>
                    <td>Hobbies:</td>
                    <td>Country:</td>
                    <td>Profile:</td>
                    <td>Status:</td>
                    <td>Action:</td>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $items)            
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$items->name}}</td>
                    <td>{{$items->email}}</td>
                    <td>{{$items->mobile}}</td>
                    <td>{{$items->gender}}</td>
                    <td>{{$items->hobbies}}</td>
                    <td>{{$items->country}}</td>
                    <td>
                        <img src={{asset("profiles/$items->profile")}} alt="{{$items->profile}}" width="50" height="50">
                    </td>
                    <td>
                        <a href={{url("admin/status-change/$items->id/Active")}} class="text-success @if($items->status == 'Active') font-weight-bold border p-1 @endif">Active</a>
                        <a href={{url("admin/status-change/$items->id/Inactive")}} class="text-danger @if($items->status == 'Inactive') font-weight-bold border p-1 @endif">Inactive</a>
                    </td>
                    <td class="d-flex justify-content-between align-items-center">
                        <a href={{url("admin/edit-employee/$items->id")}} title="Edit" class="btn btn-success"><i class="fa fa-fw fa-pencil"></i></a>
                        <a href={{url("admin/delete-employee/$items->id")}} onclick="return confirm('Are you sure to delete this record')" title="Delete" class="btn btn-danger deleteBtn"><i class="fa fa-fw fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>            
        </table>
    </div>
</div>