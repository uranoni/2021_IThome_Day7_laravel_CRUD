@extends('layout')


@section('content')
<div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>標題</th>
        <th>使用者ID</th>
      </tr>
    </thead>
    <tbody>
      @foreach($skills as $skill )
      <tr>
        <td>{{$skill->id}}</td>
        <td>{{$skill->title}}</td>
        <td>{{$skill->user_id}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection