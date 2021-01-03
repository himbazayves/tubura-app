@extends('layouts.master')



@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Application create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Seed Application</li>
    </ol>
</nav>

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Seed Application Show </h1>
        </div>

    <div class="card-body">
                                                        <div class="form-group">
            <label class="col-form-label" for="value">Open</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$seedApplication->open}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

                        <div class="card-header">
        <h2>Seed Requests</h2>
        </div>
        <div class="card-body">
            <div>
                <a href="{{route('seed-requests.create')}}">New</a>
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
                    @foreach($seedApplication->seed_requests as $seed_request)
                    <tr>
                        <td>
                        <a href="{{route('seed-requests.show',['seedRequest'=>$seedRequest] )}}">Show</a>
                        <a href="{{route('seed-requests.edit',['seedRequest'=>$seedRequest] )}}">Edit</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-seed-request-{{$seedRequest->id}}').submit();">
                            Delete
                        </a>
                        <form id="delete-seed-request-{{$seedRequest->id}}" action="{{route('seed-requests.destroy',['seedRequest'=>$seedRequest])}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </td>
                                                                                                                                                                                                                        <td> {{ $seedRequest->requested_amount}}</td>
                                                                                                <td> {{ $seedRequest->given_amount}}</td>
                                                                                                                                                                                                                                                                                                                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
                
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection