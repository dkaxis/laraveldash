<p>
<ul class="nav nav-tabs">
  <li role="presentation" class="{{ Request::is('clients/*/contracts','clients/*/contracts/*') ? 'active' : ''}}"><a href="{{ url('/clients/'.$client->id.'/contracts') }}">Kommunal Handleplan</a></li>
  <li role="presentation" class="{{ areActiveURLs(['clients/'.$client->id.'/plans']) }}"><a href="{{ url('/clients/'.$client->id.'/plans') }}">Pædagoisk Handleplan</a></li>
  <li role="presentation"class="{{ isActiveURL('/clients/'.$client->id.'/app/*') }}"><a href="{{ url('/clients/'.$client->id.'/goals') }}">Mål</a></li>
  <li role="presentation"class="{{ Request::is('clients','clients/*/contacts/*') ? 'active' : '' }}"><a href="#">Delmål</a></li>
  <li role="presentation"class="{{ Request::is('clients','clients/*/plans/*') ? 'active' : '' }}"><a href="{{ url('/clients/'.$client->id.'/plans') }}">Status Rapport</a></li>

  
</ul> 
</p>
