@extends('layouts.admin')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-10 ">
            
              @if(Session::has('success'))
              <div class="mt-3 col-12 col-md-8 ">
                  <div class="alert alert-success">
                                     {{ session('success')}}
                    </div>
              </div>
              @endif
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h5 class="header-pretitle">
                     Laboratory Test result #{{$ex->id}}
                    </h5>

                    <!-- Title -->
                   

                  </div>
                  <div class="col-auto">
                  
                    <!-- Button -->
                  <a href="{{route('examination.pdf',$ex->id)}}" class="btn btn-primary">
                     print
                    </a>
                    
                  </div>
                  
                </div> <!-- / .row -->
              </div>
            </div>
            <div class="col-12 ">
                <div class="header">
                   <div class="header-body"> 
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="mb-2">
                            Patient Id: {{$ex->patient->id}}
                            </h6>
                    
                      <h6 class="mb-2">
                       Patient Names: {{$ex->patient->fullName}}
                      </h6>
                      
                      <h6 class="mb-2">
                        Date: {{$ex->created_at->format('d M Y , H:m')}}
                       </h6>
                       <h6 class="mb-2">
                       Address: {{$ex->patient->address}}
                       </h6>
  
                      <!-- Title -->
                     
  
                    </div>
                    <div class="col-auto">
                      
                        <!-- Pretitle -->
                        <h6 class="mb-2">
                          age: {{$ex->age}}
                        </h6>
                        <h6 class="mb-2">
                          sex: {{$ex->patient->getSex()}}
                         </h6>
                         <h6 class="mb-2">
                          phone: {{$ex->patient->phone}}
                         </h6>
    
                        <!-- Title -->
                       
    
                      </div>
                    
                  </div> <!-- / .row -->
                   </div>
                </div>
                
 
                    </div>
                    <div class="col-12 mt-5">
                         <!-- Card -->
                         <div class="header mt-5">
                           <div class="header-body">
                             <div class="col-8">
                             <img class="img-fluid" id="output" src="{{asset('storage/'.$ex->test_image)}}">
                             </div>
      
                           </div>
                         </div>
                  <div class="mt-5">
                    <div class="row align-items-center">
                      <div class="col">
                          <h6 class="mb-5">
                              Collected by: {{$ex->doctor->fullName}}
                              </h6>
                      
                        <h6 class="mb-2">
                             Test results interpretation:  {{$ex->getResult()}}
                        </h6>
                        
                       
    
                        <!-- Title -->
                       
    
                      </div>
                  </div>
      
                    </div>
                   
                </div>
              </div>
          </div>
        </div>
</div>
@endsection
