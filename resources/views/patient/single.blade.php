@extends('layouts.admin')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-6">
             
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    

                    <!-- Title -->
                    <h1 class="header-title">
                      Patient Details
                    </h1>

                  </div>
                  <div class="col-auto">
                  
                    <!-- Button -->
                    {{-- {{route('create.prediction',$patient->id)}} --}}
                  <a href="{{route('create.prediction',$patient->id)}}" class="btn btn-primary">
                      New Test
                    </a>
                    
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>
            <div class="col-12 col-xl-10 mt-5">

                <!-- Card -->
                <div class="card">
                  <div class="card-body">
    
                    <!-- List group -->
                    <div class="list-group list-group-flush my-n3">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Names
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Time -->
                            <small class="text-muted" >
                             {{$patient->fullName}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                              Address
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                              {{$patient->address}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                              Gender
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                                @if($patient->gender==1)
                                  Male
                                  @else 
                                  Female
                                  @endif
                             
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Phone
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                              {{$patient->phone}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Date of Birth
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Link -->
                            <time  class="small text-muted">
                              {{$patient->DOB->age}} years old
                            </time>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Test
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Link -->
                            <a href="#!" class="small">
                              {{$patient->test->count()}}
                            </a>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                    </div>
    
                  </div>
                </div>
    
                <!-- Weekly Hours -->
               @if($patient->test->count()>0)
               <h3 class="mt-6 text-center mt-5">Test</h3>
                <div class="card" id="paymentTable" >
                   
                    
                            <div class="table-responsive mt-5" data-toggle="lists" data-lists-values='["No", "Date","Doctor"]'>
                                    <table class="table  table-nowrap card-table">
                                      <thead>
                                        <tr>
                                          <th scope="col">
                                            <a href="#" class="text-muted sort" data-sort="No">#</a>
                                          </th>
                                          <th scope="col">
                                            <a href="#" class="text-muted sort" data-sort="Date">Date</a>
                                          </th>
                                          <th scope="col">
                                            <a href="#" class="text-muted sort" data-sort="Doctor">Doctor</a>
                                          </th>
                                       
                                        
                                         
                                          
                                          
                                         
                                         
                                          
                                        </tr>
                                      </thead>
                                      <tbody class="list">
        
                                         
                                            @foreach ($tests->sortByDesc('created_at') as $c)
                                        <tr>
        
                                          <td  class="No">{{$loop->index+1}}</td>
                                          <td class="Date">{{$c->created_at->format('d M y')}}</td>
                                     
                                          <td class="Doctor">{{$c->doctor->fullName}}</td>
                                        <td class="Doctor"><a href="{{route('test.show',$c->id)}}">view</a></td>
                                           <tr>
                                           
                                       
                                     
                                          
                                          
                                        
                                                                                      
                                         
                                         
                                                
                                                                  
                                                    @endforeach
                                                      
                                    </tbody>
                                    
                                    </table>
                                  </div>
                                  {{$tests->links()}}
                    </div>
                    @endif
                    </div>
                </div>
              </div>
          </div>
        </div>
</div>
@endsection