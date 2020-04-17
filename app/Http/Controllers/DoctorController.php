<?php

namespace App\Http\Controllers;

use App\User;
use App\Rules\PasswordRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use   PDF;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $doctors=User::with('test')->paginate(5);

        return view('docter.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'first_name'=>'required|string|min:2|max:100',
            'last_name'=>'required|string|min:2|max:100',
            'address'=>'required|string|min:2|max:100',
            'phone'=>'bail|required|string|min:2|max:100|unique:users,phone',
            'email'=>'bail|required|email|unique:users,email',
            'gender'=>'required|in:1,2',
            'speciality'=>'required|string|min:2|max:100',
             
           

        ])->validate();
      
        $dob;
        // check if date is valid
        try {
              $dob=checkDateHelper::check($request->year, $request->month, $request->day);
            
        } catch (\Exception $ex) {

            return Redirect::back()->withErrors(['invalid date of birth'])->withInput();
        }
        DB::beginTransaction();
        $user=new User;
        try{
           
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->gender=$request->gender;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->phone=$request->phone;
            $user->DOB=$dob;
            $user->password=Hash::make(str_random(8));
            $user->isAdmin=0;
            $user->active=1;
            $user->speciality=$request->speciality;
            $user->save();
        $token=app('auth.password.broker')->createToken($user);
        
         Notification::send($user, new Welcome($token));
         DB::commit();
         return redirect()->route('doctor.show', $user->id);
         } catch(\Exception $e)
         {
            DB::rollback();
            throw $e;
        }
       
    }
    public function disableEnable($id)
    {
        $doctor=User::findOrfail($id);
        $doctor->active=!$doctor->active;
        $doctor->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor=User::with('test','test.patient')->findOrfail($id);
        return view('docter.single',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function pdf(){
        $docters=User::all();
        $pdf=PDF::loadView('docter.pdf',compact('docters'));
       
        return $pdf->download("doctors.pdf");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function editPassword(){
        return view('docter.editPassword');
    }
    public function editEmail(){
        $user = Auth::user();
        
         
          return view('docter.editProfileEmail',compact('user'));
    }
    public function editGeneral(){
        $user = Auth::user();
      
    
         
         
          return view('docter.editProfile',compact('user'));
    }
    
 
    public function updateEmail(Request $request)
    {
        $user = Auth::user();
       
        
        Validator::make($request->all(), [
           
            'password' => ['required', 'string', 'max:255',new PasswordRule],
            'email'=>['bail','email','unique:users,email,'.$user->id],
            
        ])->validate();
        
       
       
        
         
          $user->email=$request->email;
         
          $user->save();
          return redirect()->back()->with("success","email updated successfully");
    }
    public function updateGeneral(Request $request)
    {
        
        Validator::make($request->all(), [
           
            'address' => ['required', 'string', 'max:255'],
           
            'phone' =>['required','string'],
          
        ])->validate();
        
        $user = Auth::user();
      
         
          $user->address=$request->address;
          $user->phone=$request->phone;
         
          $user->save();
          return redirect()->back()->with("success","updated successfully");
    }
    public function updatePassword(Request $request){
        Validator::make($request->all(), [
           
            'current' => ['required', 'string',new PasswordRule],
            'new'=>'required|min:8|max:255',
            'password_confirmation' => 'same:new',
            
            
        ])->validate();
        $user = Auth::user();
        
           $user->password= Hash::make($request->new);
           $user->save();
          return redirect()->back()->with("success","password updated successfully");
    }
}
