@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      
        <div class="col-md-12">
          @include('client.topbar')
            @include('plans.tabs')
        <h3>Mål
                    <a href="{{url('clients/'.$client->id.'/goals/create')}}" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-plus"> </i></a>

        </h3>
         <div class="panel panel-default">
          
            @if(count($goals))
            <table class="table table-condensed">
            @foreach($goals as $goal)
            <tr>
                <td>{{ $goal->goal }}</td>
                <td>%</td>
                 <td>   
                    <a href="{{url('clients/'.$client->id.'/goals/'.$goal->id.'/edit')}}" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-pencil"> </i></a>
                    <a role="button" data-toggle="collapse" href="#goal_{{$goal->id}}}" aria-expanded="false" aria-controls="goal_{{$goal->id}}" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-eye-open"> </i></a>
                    
                </td>
            </tr>
            <tr class="collapse info" id="goal_{{$goal->id}}">
                <td>
                <strong>Beskrivelse</strong><br>
                {{$goal->description}}
                </td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
            </table>
            @else
              <div class="panel-body">
            Ingen mål    
                </div>
            @endif
        
        </div>
        </div>
    </div>
</div>

@endsection