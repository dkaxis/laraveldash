@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      @include('layouts.sidebar')
        <div class="col-md-11 col-md-offset-1 col-sm-offset-1">
            <h2>Rediger {{ $user->first_name }} {{ $user->last_name }}</h2>
       <div class="panel panel-default"> 
           <div class="panel-body">    
       <div class="media">
  <div class="media-left">
                      <img class="media-object" src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px;border-radius:50%;">

  </div>
  <div class="media-body">
   <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        {{method_field('PATCH')}}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">Fornavn</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Efternavn</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Telefon</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            @if(Auth::user()->hasRole('Admin'))
   <div class="form-group">
                           <label for="role" class="col-md-4 control-label">Rolle</label>
                           <div class="col-md-6">
                               <select class="form-control" name="role_id">
                                   @foreach($roles as $role)
                                     <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif>{{$role->name}}</option>
                                     @endforeach
                                </select>
                           </div>
                       </div>
                       @endif
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Opdater
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
  </div>
</div></div>
                    
            
                    
              
             
            
         
        </div>
    </div>
</div>
@endsection
