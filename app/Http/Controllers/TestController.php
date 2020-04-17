<?php

namespace App\Http\Controllers;

use App\Patient;
use App\MalariaTest;
use GuzzleHttp\Client;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use   PDF;

class TestController extends Controller
{
  use UploadTrait;

  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){
    $exs=MalariaTest::with('doctor','patient')->orderBy('created_at', 'DESC')->paginate(5);
    return view('examination.list',compact('exs'));
   
  }
  public function myTest(){
    $exs=MalariaTest::with('doctor','patient')->orderBy('created_at', 'DESC')->where('user_id',auth()->user()->id)->paginate(5);
    return view('examination.list',compact('exs'));
  }
    public function createPrediction($id){
        $patient=Patient::findOrfail($id);
        return view('examination.create',compact('patient'));
    }
    public function predict($id,Request $request){
        $patient=Patient::findOrfail($id);
        Validator::make($request->all(),[
          'test_image'     =>  'required|image|mimes:jpeg,png,jpg|max:2048',
            
             
           

        ])->validate();
        $client = new \GuzzleHttp\Client();
        $file=$request->file('test_image');
        $request = $client->post( env('prediction'), [
          
          'multipart' => [
            
              [
                  'name'     => 'file',
                  'contents' => fopen($file, 'r'),
                 
              ]
          ]
      ]);
      try {
       
       if($request->getStatusCode()==200){
           $test=new MalariaTest;
           $test->prediction=$request->getBody()->getContents();
         $folder;
         if($test->prediction==1)
           $folder='/uploads/test/uninfected/';
         else
           $folder='/uploads/test/parasitized/';

           $name=time();
           $filePath = $folder . $name. '.' . $file->getClientOriginalExtension();
           $this->uploadOne($file, $folder, 'public', $name);
           $test->user_id=auth()->user()->id;
           $test->test_image=$filePath;
           $test->patient_id=$patient->id;
           $test->save();
           
           
       }else{
        throw new \Exception('error occured');
       }
                     
      } catch (\GuzzleHttp\Exception\ClientException $e) {
        return Redirect::back()->withErrors(($e->getBody()->getContents()))->withInput();
      }catch(\Exception $e){
        return Redirect::back()->withErrors($e->getMessage())->withInput();
      }
    
}
public function show($id){
  $ex=MalariaTest::findOrfail($id);
  return view('examination.show',compact('ex'));
}
public function downloadPdf($id){
  $ex=MalariaTest::with('patient','doctor')->findOrfail($id);
     $pdf=PDF::loadView('examination.pdf',compact('ex'));
     $name="report".$ex->id.".pdf";
     return $pdf->download($name);

 }
 public function printPDF(){
  $exs=MalariaTest::with('doctor','patient')->get();
  $pdf=PDF::loadView('examination.listPDF',compact('exs'));
 
  return $pdf->download('examinations.pdf');
 }

  
}
