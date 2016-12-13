@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
     @include('layouts.sidebar')
   
        <div class="col-md-11  col-sm-10 col-md-offset-1 col-sm-offset-2">
           <form enctype="multipart/form-data" action="/profile/{{$user->id}}" method="POST">
        <h2>Min Profil</h2>
        <div class="panel panel-default">
        <div class="panel-body">    
        <div class="row">
            <div class="col-md-2">
            <img src="uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px;border-radius:50%;">
                     <div class="form-group">
    <label class="sr-only" for="email">Phone</label>
    <div class="input-group">
    <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
       <input type="file" class="form-control" name="avatar">
          </div>
  </div> 
            </div>
            <div class="col-md-10">
             <h3>{{ $user->first_name }}  {{ $user->last_name }}</h3>  
     
              {{method_field('PATCH')}}
              {{ csrf_field() }}   
   
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="sr-only" for="email">Email</label>
    <div class="input-group">
      <div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
      <input type="email" class="form-control" name="email"  id="email" placeholder="{{ $user->email }}" value="{{ $user->email }}">
       @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label class="sr-only" for="phone">Phone</label>
    <div class="input-group">
      <div class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></div>
      <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ $user->phone }}" value="{{ $user->phone }}">
       @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
          
                <input type="submit" value="opdater" class="pull-right btn btn-sm btn-primary">
               </form>
            </div>
        </div>
         </div>
        </div>
        </div>
    </div>
</div>
@endsection
