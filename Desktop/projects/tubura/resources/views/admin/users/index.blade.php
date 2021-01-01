@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>User</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All User</li>
    </ol>
</nav>


@endsection



@section('content')

@if(session('success'))
    
    
@include('admin.partials.success_alert')
@endif

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<a style="margin-bottom:20px" href="{{route('users.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($users))
    <thead>
        <tr>
                        
                                    <th>Name</th>
            
                                    <th>Surname</th>
                                    <td>Cell</td>
            
                                    <th>Phone Number</th>
            
                        
                                    
            
                                    <th>Email</th>
            
                        
                                    
            
                        
                                    
            
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($users as $user)
    <tr>
                    <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>Cell</td>
                <td>{{$user->phone_number}}</td>
                        
                <td>{{$user->email}}</td>
                      
               
                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('users.edit',['user'=>$user] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('users.show',['user'=>$user] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-user-{{$user->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-user-{{$user->id}}" action="{{route('users.destroy',['user'=>$user])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Users</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
