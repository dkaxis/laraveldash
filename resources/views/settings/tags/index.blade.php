@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
         
        <div class="col-md-12">
       <ol class="breadcrumb" style="margin-top:20px;margin-bottom:8px;padding:0px 15px;">
  <li><h4><a href="#">Settings</a></h4></li>
  <li class="active"><a href="#">Tags</a></li>
  <li >Data</li>
</ol> 
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-info">
                <div class="panel-heading">Tags</div> 
                    <ul class="list-group">
                    @foreach($tags as $tag)
                        <li class="list-group-item">
                            {{$tag->name}}
                            <a href="{{url('/settings/tags/delete/'.$tag->id)}}" class="btn btn-sm btn-default pull-right" onclick="return confirm('Vil du slette Tag ?');">
                                <i class="glyphicon glyphicon-trash"> </i>
                            </a> 
                                  <a href="{{url('/settings/tags/edit/'.$tag->id)}}" class="btn btn-sm btn-default pull-right" >
                                <i class="glyphicon glyphicon-pencil"> </i>
                            </a>     
                        </li>
                    @endforeach
                    </ul>
            </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                <div class="panel-heading">Nyt tag</div>    
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/settings/tags') }}">
                           {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="" >Tag Navn</label>
                                <input class="form-control" type="text" name="name" value="">
                                  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default">Gem</button>
                        </form>
                    </div>
            </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
@endsection
