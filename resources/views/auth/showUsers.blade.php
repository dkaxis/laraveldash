@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-11 col-sm-10 col-md-offset-1 col-sm-offset-2">
        <h2> @lang('settings.users')     @if(Auth::user()->hasRole('Admin'))<a href="{{url('/register')}}" class="btn btn-sm btn-default pull-right"><i class="glyphicon glyphicon-plus"></i></a>@endif</h2>
        <div class="panel panel-default">
            
     
            <table class="table table-bordered">
                <tr><th>Navn</th><th>Email</th><th>Telefon</th><th>Rolle</th></tr>
                @foreach($users as $user)
                <tr>
                    <td><i class="glyphicon glyphicon-user"> </i> {{$user->first_name}} {{$user->last_name}} </td>
                    <td><i class="glyphicon glyphicon-envelope"> </i> {{$user->email}}</td>
                    <td><i class="glyphicon glyphicon-phone"></i> {{$user->phone}}</td>
                    <td>
                    @foreach($user->roles as $role)
                    <span class="label label-success label-{{strtolower($role->name)}}">{{$role->name}}</span>    
                    @endforeach    
                    </td>
                    <td align="right">
                        <a href="users/edit/{{$user->id}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-pencil"> </i></a>
                            @if(Auth::user()->hasRole('Admin'))
                        <a href="users/delete/{{$user->id}}" class="btn btn-sm btn-default" onclick="return confirm('Vil du slette brugeren ?');"> <i class="glyphicon glyphicon-trash"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
                       
            
        </div>
        </div>
    </div>
</div>
@endsection
