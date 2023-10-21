<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function login(Request $request) {
      $validator = Validator::make($request->all(), [
         'email' => 'required|email',
         'password' => 'required'
      ]);

      $email = $validator->safe()->only('email')['email'];
      $password = base64_decode($validator->safe()->only(['password'])['password']);
      $user = User::where('email', $email)->first();

      $validator->after(function(\Illuminate\Validation\Validator $validator) use ($password, $user) {
         if (!$user) {
            $validator->errors()->add('email', 'Kredensial tidak cocok');
            $validator->errors()->add('password', 'Kredensial tidak cocok');
         } else {
            if (!Hash::check($password, $user->password)) {
               $validator->errors()->add('email', 'Kredensial tidak cocok');
               $validator->errors()->add('password', 'Kredensial tidak cocok');
            }
         }
      });

      if ($validator->fails()) return redirect('/admin/login')->withErrors($validator)->withInput(['email']);

      if (Auth::attempt(compact('email', 'password'))) {
         $request->session()->regenerate();
         return redirect('/admin/dashboard');
      }
   }
}
