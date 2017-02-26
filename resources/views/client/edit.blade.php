@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
  
        <div class="col-md-12">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="">
            
            <h2>Rediger {{$client->full_name}}</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                        {{ csrf_field() }}
                        {{method_field('PATCH')}}
                    <div class="row">
                        <div class="col-md-2">
                              <img src="/uploads/avatars/{{ $client->avatar }}" style="width:150px; height:150px;border-radius:50%;">
                     <div>
    <label class="sr-only" for="email">avatar</label>
    <div class="input-group">
    <div class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></div>
       <input type="file" class="form-control" name="avatar">
          </div>
  </div> 
                        </div>
                        <div class="col-md-10">
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-2 control-label">Fornavn</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name', $client->first_name) }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-2 control-label">Efternavn</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name', $client->last_name) }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('cpr') ? ' has-error' : '' }}">
                            <label for="cpr" class="col-md-2 control-label">CPR-Nummer</label>

                            <div class="col-md-6">
                                <input id="cpr" type="text" class="form-control" name="cpr" value="{{ old('cpr',$client->cpr) }}" required>

                                @if ($errors->has('cpr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-2 control-label">Telefon</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone',$client->phone) }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-2 control-label">Adresse</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address" required>{{old('address',$client->address)}}</textarea>       
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                              <div class="form-group{{ $errors->has('primary-kp') ? ' has-error' : '' }}">
                            <label for="primarykp" class="col-md-2 control-label">Primære KP</label> 
                            <div class="col-md-6">
                                <input id="pkp" type="text" class="form-control" name="pkp" value="" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kpk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                              <div class="form-group{{ $errors->has('secondary-kp') ? ' has-error' : '' }}">
                            <label for="primarykp" class="col-md-2 control-label">Sekundære KP</label> 
                            <div class="col-md-6">
                                <input id="skp" type="text" class="form-control" name="skp" value="" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('spk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-7">
                                <button type="submit" class="btn btn-primary col-md-1">
                                    Gem
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                        
            
                </div>
            </div>
                    </form>
        </div>
    </div>
</div>

@endsection
@section('pagescript')
    <script>
    $(function() {


   var tags = [
    @foreach ($client->users as $tag)
       
    {
        id: "{{$tag->id}}",
        first_name: "{{$tag->first_name}}",
        last_name:  "{{$tag->last_name}}"
    },
  
    @endforeach
];
   var $select = $('#pkp').selectize({
    plugins: ['remove_button'],    
    valueField: 'id',
    labelField: 'first_name',
    searchField: ['first_name','last_name'],
     persist: false,
    options: tags,
    create: false,
    render: {
        item: function(item, escape) {
							var name = escape(item.first_name) +' '+ escape(item.last_name);
							return '<div>' +
								(name ? '<span class="name">' + name + '</span>' : escape(item.first_name))  +
							'</div>';
						},
        option: function(item, escape) {
            var name = escape(item.first_name) +' '+ escape(item.last_name);
            return '<div>' +
                '<span class="title">' +
                    '<span class="name"><i class="glyphicon glyphicon-user"></i>' + name + '</span>' +
                '</span>' +
            '</div>';
        }
    },
    load: function(query, callback) {
        if (!query.length) return callback();
        $.ajax({
            url: '{{ url('/listusers')}}',
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
var $select2 = $('#skp').selectize({
    plugins: ['remove_button'],    
    valueField: 'id',
    labelField: 'first_name',
    searchField: ['first_name','last_name'],
     persist: false,
    options: tags,
    create: false,
    render: {
        item: function(item, escape) {
							var name = escape(item.first_name) +' '+ escape(item.last_name);
							return '<div>' +
								(name ? '<span class="name">' + name + '</span>' : escape(item.first_name))  +
							'</div>';
						},
        option: function(item, escape) {
            var name = escape(item.first_name) +' '+ escape(item.last_name);
            return '<div>' +
                '<span class="title">' +
                    '<span class="name"><i class="glyphicon glyphicon-user"></i>' + name + '</span>' +
                '</span>' +
            '</div>';
        }
    },
    load: function(query, callback) {
        if (!query.length) return callback();
        $.ajax({
            url: '{{ url('/listusers')}}',
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
var control2 = $select2[0].selectize;
@foreach ($client->users as $tag)
   @if($tag->pivot->primary == 1)  
   control.addItem({{$tag->id}});
  @else
    control2.addItem({{$tag->id}});
  @endif
    @endforeach

 });
    </script>
@stop