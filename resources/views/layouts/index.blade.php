@extends('layouts.default')
<style>
    th {
      background-color: #dcdcdc;
      color: black;
      padding: 5px 20px;
    }
    tr:nth-child(odd) td{
      background-color: #fff;
    }
    td {
      padding: 20px 30px;
      background-color: #eee;
      text-align: center;
    }
</style>
@section('title', 'index.blade.php')

@section('content')


  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->id}}
    </td>
    <td>
      {{$item->name}}
    </td>
    <td>
      {{$item->password}}
    </td>
  </tr>
  @endforeach
</table>
@endsection