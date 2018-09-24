<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2C3E50;">
        
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="/img/QCM.png" style="width: 80px;height: 20px;margin-right: 6px;">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ml-2">
                       @guest
                            
                        @else
                       
                        
                       
                        
                      
                        <li  style="font-size: 14px;">
                            <a href="{{ url('qcms') }}" class="btn btn-primary"   role="button" >
                                Mes QCM     
                            </a>
                        </li>
                       
                        <li  style="font-size: 14px;">
                            <a class="btn btn-primary"   role="button" href="{{ url('groups') }}">
                                Mes groupes   
                            </a>
                        </li>

                        <li  style="font-size: 14px;">
                            <a class="btn btn-primary"   role="button" href="{{ url('groups') }}">
                                Mes résultats   
                            </a>
                        </li>

                        
                       
                        
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                              
                                    
                                       
                      

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ url('profile/'.Auth::user()->id) }}">Mon compte </a>
                                    <a class="dropdown-item" href="#">Paramètres du compte </a>

                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
         
        </nav>