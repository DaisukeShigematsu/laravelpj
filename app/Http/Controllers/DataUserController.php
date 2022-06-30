<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DataUserController extends Controller
{
    public function index()
    {
        $items = User::simplePaginate(5);
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
        DB::table('users')->insert($param);
        return redirect('/data');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::table('users')-> where('id',$request->id)->first();
        return view('edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'name'       => $request->name,
            'id'         => $request->id,
            'password'   => $request->password,
            'work_start'    => $request->work_start,
            'work_end'   => $request->work_end,
            'actual_time' => $request->actual_time,
            'rest_start' => $request->rest_start,
            'rest_end' => $request->rest_end,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
        DB::table('users')->where('id',$request->id)->update($param);
        return redirect('/data');
    }

    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::table('users')-> where('id',$request->id) ->delete();
        return view('delete', ['form' => $item]);
    }
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::table('users')->where('id',$request->id) ->delete();
        return redirect('/');
    }

}