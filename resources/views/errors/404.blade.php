@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
     
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
  <h1>404!</h1>
  <p>Page not found!!</p>
  <p><a href="{{url('/')}}">return to main page</a></p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button" data-toggle="modal" data-target="#myModal">Learn more</a></p>
</div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Errors</h4>
      </div>
      <div class="modal-body">
        {{$exception}}
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>
@endsection
