@extends('layouts.default')
<style>
    th {
      background-color: #dcdcdc;
      color: black;
      padding: 5px 20px;
    }
    tr:nth-child(4) td{
      padding: 10px;
    }
    td {
      padding: 20px 30px;
      background-color: #EEE;
      text-align: center;
    }
    input {
      padding: 5px;
    }
    button {
      padding: 10px 20px;
      background-color: #289ADC;
      border: none;
      color: white;
    }
</style>
@section('title', 'add.blade.php')

@section('content')
<form action="/add" method="POST">
  <table>
    @csrf
    <tr>
      <th>
        name
      </th>
      <td>
        <input type="text" name="name">
      </td>
    </tr>
    <tr>
      <th>
        id
      </th>
      <td>
        <input type="text" name="id">
      </td>
    </tr>
    <tr>
      <th>
        password
      </th>
      <td>
        <input type="text" name="password">
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <button>送信</button>
      </td>
    </tr>
  </table>
</form>
@endsection