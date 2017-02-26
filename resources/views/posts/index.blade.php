@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      
        <div class="col-md-12">
          @include('client.topbar')
        <h3>Logbog
            <a href="{{url('clients/'.$client->id.'/posts/new')}}" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-plus"> </i></a>
            <a href="" data-toggle="modal" data-target="#searchmodal" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-search"> </i></a>
        </h3>
     @if(isset($posts))


        
     
        @foreach($posts as $post)
             <div class="panel panel-info">
             <div class="panel-heading"> <small>{{date('l', strtotime($post->date))}}</small>
            <b> {{date('d-m-Y', strtotime($post->date))}}</b> 
            <i class="glyphicon glyphicon-time"> </i> {{$post->time}}
            <a href="{{url('/clients/'.$client->id.'/posts/edit/'.$post->id)}}" class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
            </div>
  
        <table class="table table-bordered"> 
        <tr>
            <td class="col-md-2">
            <h4>Delmål</h4>
            <span class="label label-info">ingen delmål</span>
            <h4>Tema</h4>
            @foreach($post->tags as $tag)
        <span class="label label-info">{{$tag->name}}</span>
        @endforeach
            <h4>Forfatter</h4>
            {{$post->user->first_name}}    {{$post->user->last_name}}
            </td>
            <td class="col-md-10">  <p>{!!nl2br(e($post->content))!!}</p></td>
        </tr>
        </table>
        </div>
   
        @endforeach  

        @else
             <div class="panel panel-info">
                <p>ingen indlæg</p>
          
           </div>
        @endif   
        </div>
    </div>
</div>
  @include('posts.searchbox')
@endsection