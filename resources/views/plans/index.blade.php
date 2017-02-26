@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      
        <div class="col-md-12">
          @include('client.topbar')
            @include('plans.tabs')
        <h3>Pædagoisk Handleplan
      
        </h3>
     
        </div>
    </div>
</div>

@endsection