@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
         @include('client.topbar')
               @include('plans.tabs')
            <h2>Rediger Mål</h2>
            <div class="panel panel-default">
             
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('/clients/'.$client->id.'/goals/'.$goal->id) }}">
                        {{ csrf_field() }}
                      {{method_field('PATCH')}}
                        <div class="form-group{{ $errors->has('goal') ? ' has-error' : '' }}">
                            <label for="goal" class="control-label">Mål</label>

                           
                                <input id="goal" type="text" class="form-control"  name="goal" value="{{ old('goal',$goal->goal) }}" required autofocus>

                                @if ($errors->has('goal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('goal') }}</strong>
                                    </span>
                                @endif
                         
                        </div>
                         <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label">Beskrivelse</label>

                           
                                <textarea id="description" type="text" class="form-control" rows="14" name="description" value=""  >{{ old('description',$goal->description) }}
                                </textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                         
                        </div>
                            <div class="form-group">
                            <div >
                                <button type="submit" class="btn btn-primary pull-right ">
                                    Opdater
                                </button>
                            </div>
                        </div>
                   
                    
                       
                        
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
