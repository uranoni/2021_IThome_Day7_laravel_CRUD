@extends('layout')


@section('content')
<div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>標題</th>
        <th>使用者ID</th>
        <th>技能評分</th>
        <th>分數</th>
        <th>交換技能</th>
      </tr>
    </thead>
    <tbody>
      @foreach($skills as $skill )
      <tr>
        <td>{{$skill->id}}</td>
        <td>{{$skill->title}}</td>
        <td>{{$skill->user_id}}</td>
        <td><button type="button" class="btn btn-primary" onclick="myFunction('{{$skill->id}}','{{$skill->user_id}}')">進入評分</button></td>
        <td>{{$skill->point}}</td>
        <td><button class="btn btn-primary" onclick="goTrade('{{$skill->id}}','{{$skill->user_id}}','{{$my_id}}')">進行技能交換</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- {{$skills}} -->
  <!-- {{$my_id}} -->
</div>


<script>
  function myFunction(skill_id, user_id) {
    var data = {
      skill_id,
      user_id
    }
    $.ajax({
        method: "POST",
        url: "/points",
        dataType: 'json',
        data
      })
      .done(function(msg) {
        console.log(msg)
      });
  }

  function goTrade(skill_id, user_id, my_id) {
    var data = {
      skill_id,
      user_id: my_id,
      target_user_id: user_id
    }
    window.location.replace(`/trades?skill_id=${data.skill_id}&user_id=${data.user_id}&target_user_id=${data.target_user_id}`)
  }
</script>

@endsection