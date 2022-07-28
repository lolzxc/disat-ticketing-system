<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function register_page() {
        return view('contents.user.register');
    }
    public function register(Request $request) {

        if ($request->role == 'selected') {
            return "Invalid Role Selected. Please pick again";
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'diocese' => $request->diocese,
            'school' => $request->school,
            'role' => $request->role
        ]);

        return view('contents.user.login')->with('success', true);
    }

    public function login_page() {
        return view('contents.user.login')->with('success', false);
    }

    public function login(Request $request) {
        $user = User::where('email', '=', $request->email)->first();
        

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        

        if($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('loginId', $user->id);
            return redirect('index');
        }
        else {
            return 'User not found.';
        }
    }

    public function logout()  {
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}