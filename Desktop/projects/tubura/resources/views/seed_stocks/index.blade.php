@extends('layouts.master')

@section('menu')

@include('user.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Stock</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Seed Stock</li>
    </ol>
</nav>


@endsection



@section('content')



@if(session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  {{ session('status') }} .</center>
    </div>
@endif


<a style="margin-bottom:20px" href="{{route('seed-stocks.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($seed_stocks))
    <thead>
        <tr>
                        
                                    <th>Seed</th>
                                    <th>Season</th>
                                    <th>Initial Amount(Kg)</th>
            
                                    <th>Current Amount (Kg)</th>
            
                        
                        
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($seed_stocks as $seed_stock)
    <tr>
            
        <td>{{$seed_stock->seed->name}}</td>
        <td>{{$seed_stock->season->year->name}}-{{$seed_stock->season->season_type->name}}</td>
        <td>{{$seed_stock->initial_amount}} Kg.</td>
                <td>{{$seed_stock->current_amount}} Kg.</td>
                                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('seed-stocks.edit',['seed_stock'=>$seed_stock] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('seed-stocks.show',['seed_stock'=>$seed_stock] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-seed-stock-{{$seed_stock->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-seed-stock-{{$seed_stock->id}}" action="{{route('seed-stocks.destroy',['seed_stock'=>$seed_stock])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Seed Stocks</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     




@endsection
