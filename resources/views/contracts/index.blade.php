@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      
        <div class="col-md-12">
          @include('client.topbar')
            @include('plans.tabs')
        <h3>Kommunal Handleplan
          @if(isset($contract))
            <a href="{{url('clients/'.$client->id.'/contracts/edit')}}" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-pencil"> </i></a>
            <a href="{{url('clients/'.$client->id.'/contracts/delete')}}" onclick="return confirm('Vil du Arkivere Handleplan ?');" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-trash"> </i></a>
           
            @else
            <a href="{{url('clients/'.$client->id.'/contracts/new')}}" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-plus"> </i></a>
            @endif
        </h3>
            <div class="panel panel-default">
                <div class="panel-body">
             
                @if(isset($contract))
                <div class="pull-right">
                Fra: {{date('d/m Y', strtotime($contract->date_from))}} <br>
                Til: {{date('d/m Y', strtotime($contract->date_to))}}
                </div>
                <h4>Formål</h4>
                {!! nl2br(e($contract->goal)) !!}
                <hr>
                <h4>Beskrivelse</h4>
                 {!! nl2br(e($contract->description)) !!}
                <hr>
                <h4>Klientens Ønske</h4>
                 {!! nl2br(e($contract->client_goal)) !!}
                 @else
                 @if(isset($oldcontracts))
                  <table class="table">
                  <tr>
                      <th>Handleplan</th>
                      <th>Fra dato</th>
                      <th>Til dato</th>
                      <th>Arkiveret</th>
                      <th></th>
                  </tr>
                    @foreach($oldcontracts as $oc)
                    <tr>
                        <td>{{$oc->id}}</td>
                        <td>{{date('d/m Y', strtotime($oc->date_from))}}</td>
                        <td>{{date('d/m Y', strtotime($oc->date_to))}}</td>
                        <td>{{date('d/m Y', strtotime($oc->deleted_at))}}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-load-url="{{url('clients/'.$client->id.'/contracts/show/'.$oc->id)}}" data-target="#myModal" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-eye-open"> </i></a>
                            <a href="{{url('clients/'.$client->id.'/contracts/restore/'.$oc->id)}}" onclick="return confirm('Vil du gendanne Handleplan ?');" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-open"> </i></a>
                        </td>
                    </tr>
                    @endforeach
                       </table>

                 @endif
                 @endif
                    </div>
            </div>
        </div>
    </div>
</div>
  @include('contracts.showbox')
@endsection
