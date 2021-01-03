




@extends('layouts.master')

@section('menu')

@include('user.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Show found document</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('found-documents.index')}}">Found documents</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$document->id}}</li>
    </ol>
</nav>


@endsection



@section('content')


    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif


<a href="{{route('found-documents.index')}}" class="btn btn-primary">Back to list</a>
   

<div class="alert alert-light">
   <center> <h3>Found Document</h3></center> 


<table class="table">
    <tr>
        <td colspan="2">Document number: </td>
        <td>{{$document->document_number}}</td>
    </tr>

    <tr>
        <td colspan="2">Document type:</td>
        <td> {{$document->document_type->type}} </td>
    </tr>


    <tr>
        <td colspan="2">Picture:</td>
        <td> <a href="{{asset('storage/found_documents/'.$document->picture)}}"> <img style="height:300px; width:300px" src="{{asset('storage/found_documents/'.$document->picture)}}" alt=""></a></td>
    </tr>

    <tr>
        <td colspan="2">Received:</td>
        <td> 

            @if($document->received)
        
               <span class="badge badge-success">YES</span>

            @else
            <span class="badge badge-warning">NO</span>
            @endif
           
        
        </td>
    </tr>
</table>

</div>   


<div class="alert alert-light">
    <center> <h3>Founded by</h3></center> 
    <table class="table">
        <tr>
            <td colspan="2">First Name: </td>
            <td>{{$document->user->first_name}}</td>
        </tr>

        <tr>
            <td colspan="2">Last Name: </td>
            <td>{{$document->user->last_name}}</td>
        </tr>


        <tr>
            <td colspan="2">Gender: </td>
            <td>{{$document->user->gender}}</td>
        </tr>

        <tr>
            <td colspan="2">Phone: </td>
            <td>{{$document->user->phone}}</td>
        </tr>
        
        <tr>
            <td colspan="2">E-mail: </td>
            <td>{{$document->user->email}}</td>
        </tr>


        <tr>
            <td colspan="2">Province: </td>
            <td>{{$document->user->province}}</td>
        </tr>

        <tr>
            <td colspan="2">District: </td>
            <td>{{$document->user->district}}</td>
        </tr>
    </table>
</div>


<div class="alert alert-light">
    <center> <h3>Lost by</h3></center> 
    <table class="table">
        <tr>
            <td colspan="2">First Name: </td>
            <td>{{$document->lost_document->user->first_name}}</td>
        </tr>

        <tr>
            <td colspan="2">Last Name: </td>
            <td>{{$document->lost_document->user->last_name}}</td>
        </tr>


        <tr>
            <td colspan="2">Gender: </td>
            <td>{{$document->lost_document->user->gender}}</td>
        </tr>

        <tr>
            <td colspan="2">Phone: </td>
            <td>{{$document->lost_document->user->phone}}</td>
        </tr>
        
        <tr>
            <td colspan="2">E-mail: </td>
            <td>{{$document->lost_document->user->email}}</td>
        </tr>


        <tr>
            <td colspan="2">Province: </td>
            <td>{{$document->lost_document->user->province}}</td>
        </tr>

        <tr>
            <td colspan="2">District: </td>
            <td>{{$document->lost_document->user->district}}</td>
        </tr>
    </table>
</div>
   
           

    





@endsection












