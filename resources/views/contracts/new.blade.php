@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
         @include('client.topbar')
               @include('plans.tabs')
            <h2>Ny Kommunal Handleplan</h2>
            <div class="panel panel-default">
             
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('/clients/'.$client->id.'/contracts') }}">
                        {{ csrf_field() }}
                     <div class="row">
                     <div class="col-md-9">
                        <div class="form-group{{ $errors->has('goal') ? ' has-error' : '' }}">
                            <label for="goal" class="control-label">Formål</label>

                           
                                <textarea id="goal" type="text" class="form-control" rows="14" name="goal" value="" required autofocus>
                                {{ old('goal') }}
                                </textarea>

                                @if ($errors->has('goal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('goal') }}</strong>
                                    </span>
                                @endif
                         
                        </div>
                         <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label">Beskrivelse</label>

                           
                                <textarea id="description" type="text" class="form-control" rows="14" name="description" value=""  >
                                {{ old('description') }}
                                </textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                         
                        </div>
                         <div class="form-group{{ $errors->has('client_goal') ? ' has-error' : '' }}">
                            <label for="client_goal" class="control-label">Den unges ønsker</label>

                           
                                <textarea id="client_goal" type="text" class="form-control" rows="14" name="client_goal" value="{{ old('client_goal') }}"  >
                                {{ old('client_goal') }}
                                </textarea>

                                @if ($errors->has('client_goal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('client_goal') }}</strong>
                                    </span>
                                @endif
                         
                        </div>
                     </div>
                     <div class="col-md-3">
                         <div class="form-group{{ $errors->has('date_from') ? ' has-error' : '' }}">
                            <label for="date_from" class=" control-label">Start Dato</label>
                                <div class="input-group date form_datetime"  id="datetimepicker_from" data-date="" data-date-format="yyyy-mm-dd">
                                    <input  type="text" class="form-control"  size="16" value="" readonly>
                                     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                              <input id="date_from" type="hidden" class="form-control" name="date_from" size="16" value="" readonly>    

                                @if ($errors->has('date_from'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                          <div class="form-group{{ $errors->has('date_to') ? ' has-error' : '' }}">
                            <label for="date_to" class=" control-label">Slut Dato</label>
                            <div class="input-group date form_datetime"  id="datetimepicker_to" data-date="" data-date-format="yyyy-mm-dd">
                                    <input  type="text" class="form-control"  size="16" value="" readonly>
                                     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                              <input id="date_to" type="hidden" class="form-control" name="date_to" size="16" value="" readonly>    

                                @if ($errors->has('date_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_to') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        <div class="form-group">
                            <div >
                                <button type="submit" class="btn btn-primary col-md-12">
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
@section('pagescript')
    <script>
    $(function() {

        $('#datetimepicker_from').datetimepicker({
    format: 'dd MM yyyy',
    autoclose: true,
    todayBtn: true,
    minView: 2,
    maxView: 2,
    linkField: 'date_from',
    linkFormat: 'yyyy-mm-dd'
});
        $('#datetimepicker_to').datetimepicker({
    format: 'dd MM yyyy',
    autoclose: true,
    todayBtn: true,
    minView: 2,
    maxView: 2,
    linkField: 'date_to',
    linkFormat: 'yyyy-mm-dd'
});


});
    </script>
@stop