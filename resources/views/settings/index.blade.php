@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
                @include('layouts.sidebar')

        <div class="col-md-11 col-sm-10 col-md-offset-1 col-sm-offset-2">
                                         <ol class="breadcrumb" style="margin-top:20px;margin-bottom:8px;padding:0px 15px;">
  <li><h4><a href="#">Settings</a></h4></li>
  <li ><a href="{{url('/settings/tags')}}">Tags</a></li>
  <li >Data</li>
</ol> 
            <div class="panel panel-default">
                <div class="panel-body">
             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
