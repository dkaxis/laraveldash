       <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li ><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><center>
                    <i class="glyphicon glyphicon-dashboard"> </i> 
                    @lang('settings.dashboard')</center>
                    </a></li>
                <li ><a href="{{ url('/clients/') }}" class="{{ Request::is('clients','clients/*') ? 'active' : '' }}"><center>
                    <i class="glyphicon glyphicon-user"> </i> 
                    @lang('settings.clients')</center>
                    </a></li>
                    <li ><a href="{{ url('/users/') }}" class="{{ Request::is('users','users/*') ? 'active' : '' }}"><center>
                    <i class="glyphicon glyphicon-user"> </i> 
                    @lang('settings.users')</center>
                    </a></li>
                    @if(Auth::user()->hasRole('Admin'))
                      <li ><a href="{{ url('/settings') }}" class="{{ Request::is('settings','settings/*') ? 'active' : '' }}"><center>
                    <i class="glyphicon glyphicon-user"> </i> 
                    @lang('settings.settings')</center>
                    </a></li>
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}<span class="caret"></span>
                                    </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/profile') }}">
                                    Min profil
                                    </a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                      
                    </ul>
                </div>
            </div>
        </nav>