<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
      $items = DB::select('select * from users');
        return view('index', ['items' => $items]);
    }
      public function add()
    {
        return view('add');
    }
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'id' => $request->id,
            'password' => $request->password,
        ];
        DB::insert('insert into users (name, id, password) values (:name, :id, :password)', $param);
        return redirect('/data');
    }
}