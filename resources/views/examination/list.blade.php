@extends('layouts.admin')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-12">
          
          <!-- Header -->
          <div class="header mt-md-5">
            <div class="header-body">
              <div class="row align-items-center">
                <div class="col">
                  
                  <!-- Pretitle -->
                  <h6 class="header-pretitle">
                    Overview
                  </h6>

                  <!-- Title -->
                  <h1 class="header-title">
                  Examinations
                  </h1>

                </div>
                {{-- <div class="col-auto">
                  
                  <!-- Button -->
                <a href="3" class="btn btn-primary">
                    New Employee
                  </a>
                  
                </div> --}}
              </div> <!-- / .row -->
              <div class="row mt-5">
                <div class="col-8 col-lg-4 col-xl-3">
                  
                  <div class="card">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
      
                          <!-- Title -->
                          <h6 class="card-title text-uppercase text-muted mb-2">
                            Examinations
                          </h6>
                          
                          <!-- Heading -->
                          <span class="h2 mb-0">
                           {{$exs->count()}}
                          </span>
      
                          <!-- Badge -->
                       
      
                        </div>
                        <div class="col-auto">
                          
                          <!-- Icon -->
                          <span class="h2 fe fe-briefcase text-muted mb-0"></span>
      
                        </div>
                      </div> <!-- / .row -->
      
                    </div>
                  </div>

        
              </div>
            </div>
          </div>

          <!-- Card -->
          <div class="card" id="paymentTable" >
            <div class="card-header">
              <div class="row align-items-center">
               
                <div class="col-auto">
                <a href="{{route('examination.list.pdf')}}" class="btn btn-primary">print</a>
                </div>
              </div>
            </div>
            
                    <div class="table-responsive mt-5" data-toggle="lists" data-lists-values='["no", "names","phone", "examinations","added"]'>
                            <table class="table  table-nowrap card-table">
                              <thead>
                                <tr>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="no">#</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="patient">Patient</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="docter">Docter</a>
                                  </th>
                               
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="prediction">Prediction</a>
                                  </th>
                                 
                                  
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="added">Added on</a>
                                  </th>
                                 
                                 
                                  
                                </tr>
                              </thead>
                              <tbody class="list">

                                 
                                    @foreach ($exs as $ex)
                                <tr>

                                  <td  class="no">{{$ex->id}}</td>
                             
                                  <td class="patient">{{$ex->patient->fullName}} </td>
                                   
                               
                                <td class="doctor">{{$ex->doctor->fullName}}</td>
                                <td class="prediction">{{$ex->getResult()}}</td>
                                  
                                  <td class="added"><time>{{$ex->created_at->diffForHumans()}}</time></td>
                                
                                
                                 
                                 
                                        <td>
                                                  <a href="{{route('test.show',$ex->id)}}" class="dropdown-item">
                                                      view
                                                    </a>
                                        </td>
                                            </tr>
                                                          
                                            @endforeach
                                              
                            </tbody>
                           
                            </table>
                          </div>
                          {{$exs->links()}}
            </div>
            </div>
        </div>
</div>
        </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

var userList = new List('paymentTable', { 
    valueNames: ["no", "patient","docter", "prediction","added"],
  page: 5,
  pagination: true
});	

</script>
@endsection
