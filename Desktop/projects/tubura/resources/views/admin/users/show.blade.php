@extends('layouts.master')



@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>User create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
</nav>

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> User Show </h1>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->name}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Surname</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->surname}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Phone Number</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->phone_number}}">
        </div>
                                                <div class="form-group">
            <label class="col-form-label" for="value">Is Admin</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->is_admin}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Email</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
        </div>
                                                <div class="form-group">
            <label class="col-form-label" for="value">Password</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->password}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Two Factor Secret</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->two_factor_secret}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Two Factor Recovery Codes</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->two_factor_recovery_codes}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Remember Token</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->remember_token}}">
        </div>
                                                <div class="form-group">
            <label class="col-form-label" for="value">Profile Photo Path</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->profile_photo_path}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

                                                        <div class="card-header">
        <h2>Owned Teams</h2>
        </div>
        <div class="card-body">
            <div>
                <a href="{{route('teams.create')}}">New</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                                                                                                                                                                        <th> Name</th>
                                                                                                                                                                                                                    </tr>
                </thead>
                <tbody>
                    @foreach($user->owned_teams as $ownedTeam)
                    <tr>
                        <td>
                        <a href="{{route('teams.show',['team'=>$team] )}}">Show</a>
                        <a href="{{route('teams.edit',['team'=>$team] )}}">Edit</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-team-{{$team->id}}').submit();">
                            Delete
                        </a>
                        <form id="delete-team-{{$team->id}}" action="{{route('teams.destroy',['team'=>$team])}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </td>
                                                                                                                                                                        <td> {{ $team->name}}</td>
                                                                                                                                                                                                                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
                                
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection