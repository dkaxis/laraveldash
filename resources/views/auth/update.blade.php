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
                              <input id="roles" type="text" class="form-control" name="roles" value="" required>

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
@section('pagescript')
    <script>
    $(function() {


   var tags = [
    @foreach ($user->roles as $tag)
       
    {
        id: "{{$tag->id}}",
        name: "{{$tag->name}}",
        description:  "{{$tag->description}}"
    },
  
    @endforeach
];
   var $select = $('#roles').selectize({
    plugins: ['remove_button'],    
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
     persist: false,
    options: tags,
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
                    '<span class="name"><i class="glyphicon glyphicon-user"></i>' + item.name + '</span>' +
                '</span>' +
                '<ul>' +
                    '<li>'+item.description+'</li>'+
                 '</ul>'+   
            '</div>';
        }
    },
    load: function(query, callback) {
        if (!query.length) return callback();
        $.ajax({
            url: '{{ url('/roles')}}',
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
@foreach ($user->roles as $tag)
 
   control.addItem({{$tag->id}});
    @endforeach

 });
    </script>
@stop
