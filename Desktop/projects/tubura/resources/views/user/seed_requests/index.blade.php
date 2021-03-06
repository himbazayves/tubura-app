@extends('layouts.master')

@section('menu')

@include('user.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Request</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Seed Request</li>
    </ol>
</nav>


@endsection



@section('content')



@if(session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  {{ session('status') }} .</center>
    </div>
@endif


<a style="margin-bottom:20px" href="{{route('seed-requests.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($seed_requests))
    <thead>
        <tr>
                        
                        
                        
                        
                                    <th>Requested Amount</th>
            
                                    <th>Given Amount</th>
            
                                    <th>Approved</th>
            
                                    <th>Received</th>
            
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($seed_requests as $seed_request)
    <tr>
                                            <td>{{$seed_request->requested_amount}}</td>
                <td>{{$seed_request->given_amount}}</td>
                <td>{{$seed_request->approved}}</td>
                <td>{{$seed_request->received}}</td>
                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('seed-requests.edit',['seed_request'=>$seed_request] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('seed-requests.show',['seed_request'=>$seed_request] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-seed-request-{{$seed_request->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-seed-request-{{$seed_request->id}}" action="{{route('seed-requests.destroy',['seed_request'=>$seed_request])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Seed Requests</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
