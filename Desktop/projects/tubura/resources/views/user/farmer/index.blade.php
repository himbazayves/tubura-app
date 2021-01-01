@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>All Farmers</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Farmers</li>
    </ol>
</nav>


@endsection



@section('content')


    @if (session('success'))
    
    
    @include('admin.partials.success_alert')
   @endif


<a style="margin-bottom:20px" href="{{route('farmers.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
    <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>NID</th>
           
            <td>Phone Number</td>
            
            <td> Cell </td>
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    <tbody>


     @foreach($farmers as $key => $farmer)

     <tr class="table-plus">

     <td>{{$farmer->name}}</td>
     <td>{{$farmer->surname}}</td>
     <td>{{$farmer->NID}}</td>
     
     <td>{{$farmer->phone_number}}</td>
     <td>{{$farmer->cell->name}}</td>
    
            
        	<td>
                <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        
                    <a class="dropdown-item" href="{{route('farmers.edit',$farmer->id)}}"><i class="dw dw-edit2"></i> Edit</a>

                    <a class="dropdown-item" href="{{route('farmers.show',$farmer->id)}}"><i class="dw dw-eye"></i> Show</a>

                         <form method="POST" action="{{route('farmers.destroy',$farmer->id)}}">
                           @method('delete')
                            @csrf

                            <button class="dropdown-item" type="submit"><i class="dw dw-delete-3"></i> Delete </button>
                        </form>
                       
                        
                    </div>
                </div>
            </td>
     </tr>
         
     @endforeach



        
       

    <tbody>    

    </table>     




@endsection
