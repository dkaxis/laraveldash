@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      @include('layouts.sidebar')
        <div class="col-md-11 col-md-offset-1">
            <h2>Ny @lang('settings.client')</h2>
            <div class="panel panel-default">
             
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/clients') }}">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-md-2">
                              <img src="/uploads/avatars/default.jpg" style="width:150px; height:150px;border-radius:50%;">
                     <div >
    <label class="sr-only" for="email">avatar</label>
    <div class="input-group">
    <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
       <input type="file" class="form-control" name="avatar">
          </div>
  </div> 
                        </div>
                        <div class="col-md-10">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">Fornavn</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

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
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('cpr') ? ' has-error' : '' }}">
                            <label for="cpr" class="col-md-4 control-label">CPR-Nummer</label>

                            <div class="col-md-6">
                                <input id="cpr" type="text" class="form-control" name="cpr" value="{{ old('cpr') }}" required>

                                @if ($errors->has('cpr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Telefon</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Adresse</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                                 </textarea>       
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Gem
                                </button>
                            </div>
                        </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
