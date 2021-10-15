@extends('layout')


@section('content')
<div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>交易對象</th>
        <th>交易技能名稱</th>
        <th>訂單編號</th>
        <th>價錢</th>
        <th>交易時間</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result as $res)
      <tr>
        <td>{{$res->target_user_name}}</td>
        <td>{{$res->tatget_skill_title}}</td>
        <td>{{$res->ShopNo}}</td>
        <td>{{$res->amount}}</td>
        <td>{{$res->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection