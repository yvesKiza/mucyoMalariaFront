 <!-- Header -->
 
 <div class="header mt-md-5">
 
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col">
               
              <!-- Pretitle -->
              

              <!-- Title -->
              <h1 class="header-title">
                Settings
              </h1>

            </div>
          </div> <!-- / .row -->
          <div class="row align-items-center">
            <div class="col">
              
              <!-- Nav -->
              <ul class="nav nav-tabs nav-overflow header-tabs">
                <li class="nav-item">
                  <a href="{{route('doctor.editGeneral')}}" class="nav-link">
                    General
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('doctor.editEmail')}}" class="nav-link">
                    Email

                  </a>
                </li>
                <li class="nav-item">
                      <a href="{{route('doctor.editPassword')}}" class="nav-link">
                        Password
  
                      </a>
                    </li>
                
              </ul>

            </div>
          </div>
        </div>
      </div>
      @include('includes.errors')