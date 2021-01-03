@extends('layouts.master')



@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Fertilizer Application create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fertilizer Application</li>
    </ol>
</nav>

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Fertilizer Application Show </h1>
        </div>

    <div class="card-body">
                                                        <div class="form-group">
            <label class="col-form-label" for="value">Open</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$fertilizerApplication->open}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

                        <div class="card-header">
        <h2>Fertilizer Requests</h2>
        </div>
        <div class="card-body">
            <div>
                <a href="{{route('fertilizer-requests.create')}}">New</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                                                                                                                                                                                                                        <th> Requested Amount</th>
                                                                                                <th> Given Amount</th>
                                                                                                                                                                                                                                                                                                                    </tr>
                </thead>
                <tbody>
                    @foreach($fertilizerApplication->fertilizer_requests as $fertilizer_request)
                    <tr>
                        <td>
                        <a href="{{route('fertilizer-requests.show',['fertilizerRequest'=>$fertilizerRequest] )}}">Show</a>
                        <a href="{{route('fertilizer-requests.edit',['fertilizerRequest'=>$fertilizerRequest] )}}">Edit</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-fertilizer-request-{{$fertilizerRequest->id}}').submit();">
                            Delete
                        </a>
                        <form id="delete-fertilizer-request-{{$fertilizerRequest->id}}" action="{{route('fertilizer-requests.destroy',['fertilizerRequest'=>$fertilizerRequest])}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </td>
                                                                                                                                                                                                                        <td> {{ $fertilizerRequest->requested_amount}}</td>
                                                                                                <td> {{ $fertilizerRequest->given_amount}}</td>
                                                                                                                                                                                                                                                                                                                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
                
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection