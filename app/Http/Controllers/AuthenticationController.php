<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class AuthenticationController extends Controller
{
    //

    public function redirect()
    {
        

        if (session()->get('isAuthenticated')==true) {
            $user = Auth::user();
            
            if (session()->get('role')===4) {
                // $user = Student::find(session()->get('id'));
                return redirect()->route('studentdashboard', compact('user'));
                
            } elseif (session()->get('role')===3) {
                return redirect()->route('lecturerdashboard');
            } elseif (session()->get('role')===2) {
                return redirect()->route('admindashboard');
            }
            else {
                return redirect('superadmin');
            }
        }
        else{
            return back()->with('error', 'User Not Authenticated');
        }
    }

    public function studentssubmit(Request $request){

        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|confirmed|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        
        else{
        //new user
        $users = Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => 4, 
        ]);
        // $token = $users->createToken('Personal Access Token')->plainTextToken;
        // $response = ['user'=>$users, 'token'=>$token];
        
        if($users){
            $request->session()->put('id', $users->id);
            $request->session()->put('username',$users->name);
            $request->session()->put('role',$users->role_id);
            $request->session()->put('isAuthenticated', true);
            return redirect()->route('redirect');
        }

        else{
            return back()->with('error', 'Registration Failed');
        }
       
        }
        
    }

    public function submitlogin(Request $request){

        //validation rules
        $rules = [
            'email' => 'required',
            'password' => 'required|string' 
        ];
        
       

                // Check Student table
        $user = Student::where('email', $request->input('email'))
        ->where('role_id', 4) // Assuming role_id 4 corresponds to 'student'
        ->first();

        // If not found in Student table, check Lecturer table
        if (!$user) {
        $user = Lecturer::where('email', $request->input('email'))
            ->where('role_id', 3) // Assuming role_id 3 corresponds to 'lecturer'
            ->first();
        }

        // If not found in Lecturer table, check Admin table
        if (!$user) {
        $user = Admin::where('email', $request->input('email'))
            ->where('role_id', 2) // Assuming role_id 2 corresponds to 'admin'
            ->first();
        }

        // Check if user is found and password is correct
        if ($user && Hash::check($request->input('password'), $user->password)) {
        // Set session variables or generate token as needed
        
        $request->session()->put('id', $user->id);
        $request->session()->put('username', $user->name);
        $request->session()->put('role', $user->role_id);
        $request->session()->put('isAuthenticated', true);
        
        return redirect()->route('redirect');
        } else {
        return redirect()->back()->with('error', 'Incorrect Email or Password. Please try again!');
        }
    }

    public function staffsubmit(Request $request){

        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|confirmed|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        
        else{
        //new user
        $users = Lecturer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => 3, 
        ]);
        // $token = $users->createToken('Personal Access Token')->plainTextToken;
        // $response = ['user'=>$users, 'token'=>$token];
        
        if($users){
            $request->session()->put('id', $users->id);
            $request->session()->put('username',$users->name);
            $request->session()->put('role',$users->role_id);
            $request->session()->put('isAuthenticated', true);
            return redirect()->route('redirect');
        }

        else{
            return back()->with('error', 'Registration Failed');
        }
       
        }

    }

    public function logout(Request $request)
    {
        $request->session()->forget('login_time');
        $request->session()->invalidate();

        return redirect()->route('login');
    }


}
