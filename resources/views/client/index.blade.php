@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
        <h2>Klienter <a href="{{url('/clients/new')}}" class="btn btn-sm btn-default pull-right"><i class="glyphicon glyphicon-plus"></i></a></h2>
         <div class="panel panel-default">
            <table class="table table-bordered">
                <tr><th>Navn</th><th>CPR</th><th>Telefon</th><th>Primære KP</th><th>Sekundære KP</th></tr>
                @if(count($clients))
                @foreach($clients as $client)
                <tr>
                    <td><i class="glyphicon glyphicon-user"> </i><a href="{{ url('/clients/show/'.$client->id)}}"> {{$client->full_name}}</a></td>
                    <td><i class="glyphicon glyphicon-envelope"> </i> {{$client->cpr}}</td>
                    <td><i class="glyphicon glyphicon-phone"></i> {{$client->phone}}</td>
                     <td>
                         @foreach($client->users as $user)
                         @if($user->pivot->primary == 1)
                         <span class="label label-primary">{{$user->first_name . ' ' .$user->last_name}}</span>
                         @endif
                         @endforeach
                    </td>
                      <td>
                       @foreach($client->users as $user)
                         @if($user->pivot->primary == 0)
                         <span class="label label-info">{{$user->first_name . ' ' .$user->last_name}}</span>
                         @endif
                         @endforeach
                    
                    </td>
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
