<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
  public function index(){
    $news = Cache::remember('home_news', 60, function(){
      return Post::where('type','news')->whereNotNull('published_at')->latest('published_at')->limit(3)->get();
    });
    $ann  = Cache::remember('home_ann', 60, function(){
      return Post::where('type','announcement')->whereNotNull('published_at')->latest('published_at')->limit(3)->get();
    });
    return view('home', compact('news','ann'));
  }

  public function loginForm(){ return view('auth.login'); }

  public function login(Request $r){
    $cred = $r->validate(['email'=>'required|email','password'=>'required']);
    if(Auth::attempt($cred)){ $r->session()->regenerate(); return redirect()->route('admin.dashboard'); }
    return back()->withErrors(['email'=>'Login gagal']);
  }

  public function logout(Request $r){
    Auth::logout();
    $r->session()->invalidate();
    $r->session()->regenerateToken();
    return redirect('/');
  }
}

