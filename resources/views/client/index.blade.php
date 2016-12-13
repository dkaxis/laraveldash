@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-11 col-sm-10 col-md-offset-1 col-sm-offset-2">
        <h2>Klienter <a href="{{url('/clients/new')}}" class="btn btn-sm btn-default pull-right"><i class="glyphicon glyphicon-plus"></i></a></h2>
         <div class="panel panel-default">
            <table class="table table-bordered">
                <tr><th>Navn</th><th>CPR</th><th>Telefon</th></tr>
                @if(count($clients))
                @foreach($clients as $client)
                <tr>
                    <td><i class="glyphicon glyphicon-user"> </i> {{$client->full_name}}</td>
                    <td><i class="glyphicon glyphicon-envelope"> </i> {{$client->cpr}}</td>
                    <td><i class="glyphicon glyphicon-phone"></i> {{$client->phone}}</td>
                    <td align="right">
                        <a href="clients/edit/{{$client->id}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-pencil"> </i></a>
                        <a href="clients/delete/{{$client->id}}" class="btn btn-sm btn-default" onclick="return confirm('Vil du slette brugeren ?');"> <i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <h4>Ingen Klienter</h4>
                @endif
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
