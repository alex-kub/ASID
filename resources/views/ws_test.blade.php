@extends('layout')
@section('content')

<div id="content">
  <input type="button" value="send" style="width: 300px; height: 200px;" onclick="send()"/>

  <div id="ws_data" style="border: 1px solid black">

  </div>
</div>
@endsection