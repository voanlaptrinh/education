<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
      
        $message = $request->session()->all();
        return View('auth.login', compact( 'message'));

    }
    public function postLogin(Request $request)
{
    // Kiểm tra và xác nhận dữ liệu đầu vào
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Đăng nhập thành công
        return redirect('/');
    } else {
        // Đăng nhập thất bại
        return back()->withErrors(['email' => 'Đăng nhập không thành công. Vui lòng kiểm tra thông tin đăng nhập và thử lại.']);
    }
}

    public function register(Request $request) {
      
        return View('auth.register');
    }
    public function postRegister(Request $request) {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'phone' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'nullable|string',
            'birthday' => 'nullable|string',
            'address' => 'nullable|string',
            'money' => 'nullable|string',
            'user_type' => 'nullable|integer',
        ]);

          $user = new User();
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->phone =  $request->input('phone');
            $user->password =  Hash::make($request->input('password'));
            $user->gender =  $request->input('gender');
            $user->birthday =  $request->input('birthday');
            $user->address =  $request->input('address');
           $user->user_type =   $request->input('user_type');
        
           $user->save();

           return redirect('/login')->with('success', 'Đăng ký thành công!');
    }

}
