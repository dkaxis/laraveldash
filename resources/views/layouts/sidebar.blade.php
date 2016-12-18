     <div class="col-md-1 col-sm-1 side-nav" >
            <ul class="nav nav-pills nav-stacked">
                <li ><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><center>
                    <i class="glyphicon glyphicon-dashboard"> </i><br>
                    @lang('settings.dashboard')</center>
                    </a></li>
                <li ><a href="{{ url('/clients/') }}" class="{{ Request::is('clients','clients/*') ? 'active' : '' }}"><center>
                    <i class="glyphicon glyphicon-user"> </i><br>
                    @lang('settings.clients')</center>
                    </a></li>
                    <li ><a href="{{ url('/users/') }}" class="{{ Request::is('users','users/*') ? 'active' : '' }}"><center>
                    <i class="glyphicon glyphicon-user"> </i><br>
                    @lang('settings.users')</center>
                    </a></li>
                    @if(Auth::user()->hasRole('Admin'))
                      <li ><a href="{{ url('/settings') }}" class="{{ Request::is('settings') ? 'active' : '' }}"><center>
                    <i class="glyphicon glyphicon-user"> </i><br>
                    @lang('settings.settings')</center>
                    </a></li>
                    @endif
            </ul>
        </div>