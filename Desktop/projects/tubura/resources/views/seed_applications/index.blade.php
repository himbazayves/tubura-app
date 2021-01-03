@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Application</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Seed Application</li>
    </ol>
</nav>


@endsection



@section('content')



@if(session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  {{ session('status') }} .</center>
    </div>
@endif


<a style="margin-bottom:20px" href="{{route('seed-applications.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($seed_applications))
    <thead>
        <tr>
                        
                        
                                    <th>Status</th>
                                    <th>Season</th>
            
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($seed_applications as $seed_application)
    <tr>
                            <td>
                                @if($seed_application->open)

                                <label class="badge badge-success">Open</label>
                                @else
                                <label class="badge badge-danger">Closed</label>

                                @endif
                            
                            </td>
                            <td>{{$seed_application->season->year->name}}-{{$seed_application->season->season_type->name}}</td>
                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('seed-applications.edit',['seed_application'=>$seed_application] )}}"> Edit</a>

            <a class="dropdown-item"  href="{{route('seed-applications.show',['seed_application'=>$seed_application] )}}"> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-seed-application-{{$seed_application->id}}').submit();"><i class="dw dw-eye"></i> Delete</a>
            

<form id="delete-seed-application-{{$seed_application->id}}" action="{{route('seed-applications.destroy',['seed_application'=>$seed_application])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Seed Applications</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
