@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
                @include('layouts.sidebar')

        <div class="col-md-11 col-sm-10 col-md-offset-1 col-sm-offset-2">
            <h2>Dashboard</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    Dine klienter:
                    @foreach(Auth::user()->clients as $client)

                    {{ $client->first_name}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
