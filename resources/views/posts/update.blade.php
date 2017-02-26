@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
         @include('client.topbar')
            <h2>Rediger indlæg</h2>
            <div class="panel panel-default">
             
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        {{method_field('PATCH')}}
                     <div class="row">
                     <div class="col-md-9">
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="control-label">Tekst</label>

                           
                                <textarea id="content" type="text" class="form-control" rows="14" name="content" value="" required autofocus>{!!preg_replace('/<br\s?\/?>/i', '\r\n', $post->content)!!}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                         
                        </div>
                     </div>
                     <div class="col-md-3">
                         <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class=" control-label">Dato</label>
                                <div class="input-group date form_datetime"  id="datetimepicker" >
                                    <input  type="text" class="form-control"  size="16" value="{{ $post->date }}" readonly>
                                     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                              <input id="date" type="hidden" class="form-control" name="date" size="16" value="{{ $post->date }}" readonly>    

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                          <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label for="time" class=" control-label">Tidspunkt</label>
                            <div class="input-group date form_datetime"  id="timepicker" data-date="{{ $post->date }} {{ $post->time }}" data-date-format="hh:ii">
                                    <input  type="text" class="form-control"  size="16" value="" readonly>
                                     <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                    </div>
                              <input id="time" type="hidden" class="form-control" name="time" size="16" value="{{ $post->time }}" readonly>    

                                @if ($errors->has('time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                          <div class="form-group{{ $errors->has('subgoal') ? ' has-error' : '' }}">
                            <label for="date" class=" control-label">Delmål</label>

                                <input id="subgoal" type="text" class="form-control" name="subgoal" value="{{ $post->subgoal_id}}" required>

                                @if ($errors->has('subgoal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subgoal') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                          <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="tags" class="control-label">Emner</label>

                                <input id="tags" type="text" class="form-control" name="tags" value="" required>

                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
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

     var dato = $('#datetimepicker').datetimepicker({
           
    format: 'dd MM yyyy',
    autoclose: true,
    todayBtn: true,
    minView: 2,
    maxView: 2,
    linkField: 'date',
    linkFormat: 'yyyy-mm-dd',
    forceParse: 1,
});
  var tid =  $('#timepicker').datetimepicker({
    format: 'hh:ii',
    autoclose: true,
    startView: 1,
    maxView: 1,
    linkField: 'time',
    linkFormat: 'hh:ii:ss',
    forceParse: 1
});

    $('#timepicker').datetimepicker('update', '{{$post->date}} {{$post->time}}');

   var tags = [
    @foreach ($post->tags as $tag)
       
    {
        id: "{{$tag->id}}",
        name: "{{$tag->name}}"
    },
  
    @endforeach
];

   var $select = $('#tags').selectize({
    plugins: ['remove_button'],    
    valueField: 'id',
    labelField: 'name',
    searchField: ['name'],
     persist: false,
     preload:'focus',
      loadThrottle: 300,
      options: tags,
   openOnFocus: true,
    create: false,
    render: {
        item: function(item, escape) {
							
							return '<div>' +
								'<span class="name">' + item.name + '</span>'  +
							'</div>';
						},
        option: function(item, escape) {
           
            return '<div>' +
                '<span class="title">' +
                    '<span class="name">' + item.name + '</span>' +
                '</span>' +
            '</div>';
        }
    },
    load: function(query, callback) {
      
        $.ajax({
            url: '{{ url('/tags')}}',
            type: 'GET',
            error: function() {
                callback();
            },
            success: function(res) {
                  console.log(res);
                callback(res);
              
            }
        });
    }



});
    var control = $select[0].selectize;
@foreach ($post->tags as $tag)
 
   control.addItem({{$tag->id}});
    @endforeach

    });
    </script>
@stop