<p>
<ol class="breadcrumb">
  <li>{{$client->first_name}} {{$client->last_name}}</li>
  <li role="presentation" class="{{ isActiveURL('/clients/show/'.$client->id) }}"><a href="{{ url('/clients/show/'.$client->id) }}">Oversigt</a></li>
  <li role="presentation" class="{{ areActiveURLs(['clients/'.$client->id.'/posts','clients/'.$client->id.'/posts/new']) }}"><a href="{{ url('/clients/'.$client->id.'/posts') }}">Logbog</a></li>
  <li role="presentation"class="{{ isActiveURL('/clients/'.$client->id.'/app/*') }}"><a href="#">Aftaler</a></li>
  <li role="presentation"class="{{ Request::is('clients','clients/*/contacts/*') ? 'active' : '' }}"><a href="#">Kontakter</a></li>
  <li role="presentation"class="{{  areActiveURLs([
                                      'clients/'.$client->id.'/contracts',
                                      'clients/'.$client->id.'/contracts/new',
                                      'clients/'.$client->id.'/contracts/edit'
                                      
                                      ]) }}"><a href="{{ url('/clients/'.$client->id.'/plans') }}">Handleplan</a></li>
  <li role="presentation"class="{{ Request::is('clients','clients/*/so/*') ? 'active' : '' }}"><a href="#">Særlig opmærksomhed</a></li>
  <li role="presentation"class="{{ Request::is('clients','clients/*/files/*') ? 'active' : '' }}"><a href="#">Filer</a></li>
  
</ol> 
</p>
