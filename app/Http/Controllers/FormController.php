<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as AppUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function getRegister() {
        $arr = ['name','email','password','re-password'];
        return view('register',compact('arr'));
    }

    public function postRegister(Request $register) {
        $this->validate($register,
        [
            'name'=>'required|min:2|bail',
            'email'=>'required|email|unique:users,email|bail',
            'password'=>'required|min:6|bail',
            're-password'=>'required|same:password|bail'
        ],
        [
            'name.required'=>'Please enter your name',
            'email.required'=>'Please enter your email',
            'email.email'=>'Please enter the correct email format',
            'email.unique'=>'Email already in use',
            'password.required'=>'Please enter your password',
            'password.min'=>'Password must be at least six characters',
            're-password.required'=>'Please enter your confirm password',
            're-password.same'=>'Does not match the password'
        ]);
        $user = new AppUser();
        $user->name = $register->name;
        $user->email = $register->email;
        $user->password = Hash::make($register->password);
        $user->save();
        return redirect()->back()->with('Success','Create account success');

    }

    public function getSignin() {
        $arr = ['email','password'];
        return view('signin',compact('arr'));
    }

    public function postSignin(Request $signin) {
        $this->validate($signin,
        [
            'email'=>'required|email|bail',
            'password'=>'required|min:6|bail',
        ],
        [
            'email.required'=>'Please enter your email',
            'email.email'=>'Please enter the correct email format',
            'password.required'=>'Please enter your password',
            'password.min'=>'Password must be at least six characters',
        ]);
        $credentials = array('email'=>$signin->email, 'password'=>$signin->password);
        if(Auth::attempt($credentials)) {
            return redirect()->route('homePage');
        } else {
            return redirect()->back()->with(['notice'=>'danger','message'=>'Log in no success']);
        }
    }

    public function getSignout() {
        Auth::logout();
        return redirect()->route('signinPage');
    }

    public function postUpdate(Request $update) {
        $this->validate($update,
        [
            'name'=>'required|min:2|bail',
            'email'=>'required|email|unique:users,email|bail',
            'password'=>'required|min:6|bail',
            're-password'=>'required|same:password|bail'
        ],
        [
            'name.required'=>'Please enter your name',
            'email.required'=>'Please enter your email',
            'email.email'=>'Please enter the correct email format',
            'email.unique'=>'Email already in use',
            'password.required'=>'Please enter your password',
            'password.min'=>'Password must be at least six characters',
            're-password.required'=>'Please enter your confirm password',
            're-password.same'=>'Does not match the password'
        ]);
        $user = Auth::user();
        $user->name = $update->name;
        $user->email = $update->email;
        $user->password = bcrypt($update->password);
        $user->save();
        return redirect()->back()->with('Success','Update account success');
    }

    public function getUpdate() {
        $arr = ['name','email','password','re-password'];
        return view('infor_user',compact('arr'));
    }
}
