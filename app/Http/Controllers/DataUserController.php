<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUserController extends Controller
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
            'name'       => $request->name,
            'id'         => $request->id,
            'password'   => $request->password,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
        DB::insert('insert into users (name, id, password, created_at, updated_at) values (:name, :id, :password, :created_at, :updated_at)', $param);
        return redirect('/data');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from users where id = :id', $param);
        return view('edit', ['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'name'       => $request->name,
            'id'         => $request->id,
            'password'   => $request->password,
            'punchin'    => $request->punchin,
            'punchout'   => $request->punchout,
            'stamp_date' => $request->stamp_date,
            'created_at' => $request->created_at,
            'updateed_at' => $request->updated_at,
            'total_work' => $request->totalwork,
        ];
        DB::update('insert into users (name, id, password, punchin, punchout, stamp_date, created_at, updated_at,total_work) values (:name, :id, :password, :punchin, :punchout, :stamp_date, :created_at, :updated_at, :total_work)', $param);
        return redirect('/data');
    }

    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from users where id = :id', $param);
        return view('delete', ['form' => $item[0]]);
    }
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from users where id =:id', $param);
        return redirect('/');
    }

}