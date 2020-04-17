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
                

                  <!-- Title -->
                  <h1 class="header-title">
                 Doctors
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
                            Doctors
                          </h6>
                          
                          <!-- Heading -->
                          <span class="h2 mb-0">
                           {{$doctors->count()}}
                          </span>
      
                          <!-- Badge -->
                       
      
                        </div>
                        <div class="col-auto">
                  
                          <!-- Button -->
                        <a href="{{route('doctor.pdf')}}" class="btn btn-primary">
                           print
                          </a>
                          
                        </div>
                      </div> <!-- / .row -->
      
                    </div>
                  </div>

        
              </div>
            </div>
          </div>

          <!-- Card -->
          <div class="card mt-5" id="paymentTable" >
            
            
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
                                    <a href="#" class="text-muted sort" data-sort="active">Status</a>
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
                                   
                                  <th scope="col">
                                    <a href="#" class="text-muted sort" data-sort="added"></a>
                                  </th>
                                 
                                 
                                  
                                </tr>
                              </thead>
                              <tbody class="list">

                                 
                                    @foreach ($doctors as $p)
                                <tr>

                                  <td  class="no">{{$loop->index+1}}</td>
                             
                                  <td class="names">{{$p->first_name}} {{$p->last_name}} </td>
                                   
                                  @if ($p->active==1)
                                  <td class="status"><span class="badge badge-success">Active</span> </td>  
                                  @else
                                  <td class="status"><span class="badge badge-danger">Banned</span> </td>  
                                  @endif
                                 
                                <td class="phone">{{$p->phone}}</td>
                                <td class="examination">{{$p->test->count()}}</td>
                                  
                                  <td class="added"><time>{{$p->created_at->diffForHumans()}}</time></td>
                                   <td><a href="{{route('doctor.show',$p->id)}}" >
                                    view
                                  </a>
                                   </td>
                                
                                 
                                 
                                       
                                            </tr>
                                                          
                                            @endforeach
                                              
                            </tbody>
                            
                            </table>
                            {!! $doctors->links() !!}
                          </div>
            </div>
            </div>
        </div>
</div>
        </div>
</div>
@endsection

