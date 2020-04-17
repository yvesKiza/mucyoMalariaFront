@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
        
            @include('includes.profileEdit')

     
        <!-- Form -->
        {!! Form::model($user,['method'=>'PATCH','action'=>['DoctorController@updateGeneral'],'class'=>'mb-4']) !!}
        

          <div class="row">
            <div class="col-12 col-md-6">
              
              <!-- First name -->
              <div class="form-group">

                <!-- Label -->
                <label>
                  Address
                </label>

                <!-- Input -->
                {!!Form::text('address',null,['class'=>'form-control'])!!}

              </div>

            </div>
            <div class="col-12 col-md-6">
              
              <!-- Last name -->
              <div class="form-group">

                <!-- Label -->
                <label>
                Phone
                </label>

                <!-- Input -->
                {!!Form::text('phone',null,['class'=>'form-control'])!!}

              </div>

            </div>
            
            
          
            {!!Form::submit('save changes',['class'=>'btn btn-primary'])!!}
              <!-- Submit -->
             
         
          {!! Form::close() !!}
        </div>
    </div> <!-- / .row -->
    </div>
        

    
    
  </div>
  @endsection