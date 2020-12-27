@extends('layouts.master')


@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Home</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
        <!--<li class="breadcrumb-item active" aria-current="page">All Found documents</li>-->
    </ol>
</nav>


@endsection



@section('content')


   
    
 @if (session('success'))
 @include('admin.partials.sucess_alert')     

 @endif


@endsection
