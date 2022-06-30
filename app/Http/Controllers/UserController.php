<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(Request $request){
        $items = User::all();
        return view('user.index', ['items'=>$items]);
    }
    public function add(Request $request){
        return view('user.add');
    }
    public function create(Request $request){
        $this->validate($request, Book::$rules);
        $form = $request->all();
        User::create($form);
        return redirect('/user');
    }
}
