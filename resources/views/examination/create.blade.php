@extends('layouts.admin')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10">
              @if(!$errors->isEmpty())
                <div class="mt-3">
                @include('includes.errors')
                </div>
              
              @endif
               
            <!-- Header -->
            <div class="header mt-md-5 mb-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                      New Test
                    </h6>

                    <!-- Title -->
                    <h5 class="header-title">
                      {{-- {{$patient->fullName}}<br>
                      @if($patient->gender==1)
                      Male
                      @else 
                      Female
                      @endif
                      <br>{{$patient->DOB->age}} years old --}}
                      Patient

                    </h5>
                    <div>
                     names: {{$patient->fullName}}<br>
                     gender: {{$patient->getSex()}}<br>
                     age: {{$patient->DOB->age}} years old
                    </div>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
{!! Form::open(['method'=>'POST','action'=>['TestController@predict',$patient->id],'enctype' => 'multipart/form-data']) !!}
<div class="row">
    <div class="col">
        {!!Form::label('Test image','Test image')!!}

        <input type="file" accept="image/*" onchange="loadFile(event)" name="test_image">
         

                                
    </div>
</div>
<div class="row">
  <div class="col-4">
    <img class="img-fluid" id="output">
   </div>
</div>

            <!-- Divider -->
            <hr class="mt-4 mb-5">

            <!-- Project cover -->
            
           
            <div class="form-group">
              <input type="submit" onclick="return confirm('Are you sure?')" class="text-center btn  btn-primary">
                  
         </div>

         {!! Form::close() !!}

        </div>
        
      </div> <!-- / .row -->
    </div>
    @endsection
    @section('scripts')
    <script type="text/javascript">
   
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
    
    </script>
    @endsection
