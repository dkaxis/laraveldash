@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
         
        <div class="col-md-12 col-sm-12">
            <h2>Dashboard</h2>
           
                    Dine klienter:
                    @foreach(Auth::user()->clients as $client)
                    <div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading "><a href="{{ url('/clients/show/'.$client->id)}}">{{ $client->first_name}} {{ $client->last_name}}</a></div>
  <div class="panel-body">
    <p>Aftaler</p>
  </div>
  </div>
                    
                    @endforeach
             
        </div>
    </div>
</div>
@endsection
