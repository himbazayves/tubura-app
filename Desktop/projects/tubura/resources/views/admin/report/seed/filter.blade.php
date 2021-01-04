@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Application report</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Seed Application</li>
    </ol>
</nav>


@endsection

@section('filter')

<a href="{{route('seed_report.index')}}" class="btn btn-primary">Back</a>
@endsection





@section('content')





   <?php
     $totalAmount=0;

     foreach($requests as $r){
         
         $totalAmount=$totalAmount+$r->requested_amount;
     }

   ?>

  <div class="alert alert-info">
      <center> <strong> Total amount: {{$totalAmount}} kg.</strong></center>
  </div>


   <table class="data-table table stripe hover nowrap">
   
   
    <thead>
        <tr>
                        
                        
        <th>Farmer name</th>
        <th>Farmer Last name</th>
        <td>Farmer Id</td>
        <td>Requested Amount</td>
        </tr>
    </thead>
    <tbody>

        @foreach($requests as $key => $report)
        <tr>
        
        

        <td>
             {{$report->farmer->name}}                  
                            
        </td>
        <td>
            {{$report->farmer->surname}}                  
                           
       </td>
       <td>
        {{$report->farmer->NID}}                  
                       
       </td>

       <td>
           {{$report->requested_amount}} kg.
       </td>
         <tr>       
            
        @endforeach
                   
                        


    
   

    
    
       

    <tbody>    

    </table>     




@endsection
