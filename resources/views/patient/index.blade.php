@extends('layouts.admin')
@section('css')
<style>

.pagination {

  display: -ms-flexbox;
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: 0.25rem;
}
  
.pagination li { 
    margin-left: 0.2rem;
    padding: 0.2rem 0.2rem;
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
 }



.pagination .disabled { display:none; }
.pagination .active { z-index: 1;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff; }
.active .page {  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
 }


</style>

@endsection

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
                  Patients
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
                            Patients
                          </h6>
                          
                          <!-- Heading -->
                          <span class="h2 mb-0">
                           {{$patients->count()}}
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
                <a href="{{route('patient.pdf')}}" class="btn btn-primary">print</a>
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
                                    <a href="#" class="text-muted sort" data-sort="names">Names</a>
                                  </th>
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="phone">Phone</a>
                                  </th>
                               
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="examinations">Examinations</a>
                                  </th>
                                 
                                  
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="added">Added on</a>
                                  </th>
                                 
                                 
                                  
                                </tr>
                              </thead>
                              <tbody class="list">

                                 
                                    @foreach ($patients as $p)
                                <tr>

                                  <td  class="no">{{$loop->index+1}}</td>
                             
                                  <td class="names">{{$p->first_name}} {{$p->last_name}} </td>
                                   
                               
                                <td class="phone">{{$p->phone}}</td>
                                <td class="examination">{{$p->test->count()}}</td>
                                  
                                  <td class="added"><time>{{$p->created_at->diffForHumans()}}</time></td>
                                <td><a href="{{route('patient.show',$p->id)}}">view</a></td>
                                
                                 
                                 
                                       
                                            </tr>
                                                          
                                            @endforeach
                                              
                            </tbody>
                            
                            </table>
                          </div>
                          {{$patients->links()}}
            </div>
            </div>
        </div>
</div>
        </div>
</div>
@endsection

