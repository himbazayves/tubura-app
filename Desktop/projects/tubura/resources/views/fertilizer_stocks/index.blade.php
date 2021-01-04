@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Fertilizer Stock</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Fertilizer Stock</li>
    </ol>
</nav>


@endsection



@section('content')



@if(session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  {{ session('status') }} .</center>
    </div>
@endif


<a style="margin-bottom:20px" href="{{route('fertilizer-stocks.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($fertilizer_stocks))
    <thead>
        <tr>
                        
                        
                                    <th>Initial Amount</th>
            
                                    <th>Current Amount</th>
            
                        
                        
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($fertilizer_stocks as $fertilizer_stock)
    <tr>
                            <td>{{$fertilizer_stock->initial_amount}}</td>
                <td>{{$fertilizer_stock->current_amount}}</td>
                                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('fertilizer-stocks.edit',['fertilizer_stock'=>$fertilizer_stock] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('fertilizer-stocks.show',['fertilizer_stock'=>$fertilizer_stock] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-fertilizer-stock-{{$fertilizer_stock->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-fertilizer-stock-{{$fertilizer_stock->id}}" action="{{route('fertilizer-stocks.destroy',['fertilizer_stock'=>$fertilizer_stock])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Fertilizer Stocks</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
