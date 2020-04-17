<html lang="en">
<head><meta http-equiv="content-type" content="text/html;charset=utf-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    


      
    
      <title>malaria</title>
      @yield('css')
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="stylesheetLight">
      
     
      

   
    

    <title>@yield('title')</title>
  <body>
     
      <nav class="navbar navbar-expand-lg navbar-light" id="topnav">
          <div class="container">
  
            <!-- Toggler -->
            <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
  
            <!-- Brand -->
           
  
            <!-- Form -->
            
  
            <!-- User -->
            <div class="navbar-user">
        
             
  
              <!-- Dropdown -->
              <div class="dropdown">
          
                <!-- Toggle -->
                <a href="#" class="avatar avatar-sm  dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{ Auth::user()->last_name}}
              </a>
  
                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right">
                 
                <a href="{{route('doctor.editGeneral')}}" class="dropdown-item">Settings</a>
                  <hr class="dropdown-divider">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                </div>
  
              </div>
  
            </div>
  
            <!-- Collapse -->
            <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">
  
            
  
              <!-- Navigation -->
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="#"  id="topnavDashboards">
                        DashBoard
                      </a>
                    </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " href="#" id="topnavPages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Patients
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="topnavPages">
                 
                    <li>
                    <a class="dropdown-item " href="{{route('patient.create')}}"  >
                       New Patient
                      </a>
                      
                    </li>
                    <li>
                      <a class="dropdown-item " href="{{route('patient.index')}}"  >
                        Overview
                        </a>
                        
                      </li>
                    
                     
                   
                    
                   
                  
                   
                    
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="topnavAuth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Doctor
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="topnavAuth">
                     
                      <li>
                      <a class="dropdown-item " href="{{route('doctor.index')}}"  >
                           Overview
                          </a>
                          
                        </li>
                        <li>
                          <a class="dropdown-item " href="{{route('doctor.create')}}"  >
                               New Doctor
                              </a>
                              
                            </li>
                   
                        
                       
                        
                       
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " href="#" id="topnavDocumentation" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Test
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="topnavDocumentation">
                    
                    <li>
                    <a class="dropdown-item " href="{{route('test.index')}}">
                       Overview
                      </a>
                    </li>
                  
                    <li>
                      <a class="dropdown-item " href="{{route('patient.search')}}">
                         new test
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item " href="{{route('test.mytest')}}">
                          my Test
                          </a>
                        </li>
                    
                  </ul>
                </li>
               
              </ul>
  
            </div>
  
          </div> <!-- / .container -->
        </nav>
         <div class="main-content">
           <div class="container">
            @yield('content')
          </div>
          </div>
     </div>
     <footer  class ="mt-5" style="padding: 60px 0;  width:100%;background-color: black">

        <!-- Triangles -->
      
    
        <!--Content -->
        <div class="container footer-g">
          <div class="row justify-content-center">
           
            <br>
            <div class="col-12 col-sm-6">
                  
                           
              <!-- Links -->
              <ul class="list-unstyled list-inline text-center  text-md-right">
                <li class="list-inline-item mr-2">
                  <a href="/" class="text-white">
                    Home
                  </a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-white">
                    Contact
                  </a>
                </li>
                
              </ul>
              <br>
              <p class="text-white text-muted text-center  text-md-right " >
                    <small>
                      ©  {{ date('Y') }} RVIP LTD. 
                    </small>
                  </p>
    </div>
           <!-- / .row -->
         
            
          </div> <!-- / .row -->
        </div> <!-- / .container -->
    
      </footer>
      <script src="{{asset('js/jquery.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      @yield('scripts')
</body>
</html>

  