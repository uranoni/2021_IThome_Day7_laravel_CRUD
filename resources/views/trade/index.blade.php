@extends('layout')


@section('content')
<div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>評分表ID</th>
        <th>自己選擇的技能ID</th>
        <th>交換!!!</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$skill_id}}</td>

        <td>
          <select name="" id="mySelect">
            @foreach ($myskills as $ss)
            <option value="{{ $ss['id'] }}">{{ $ss['title'] }}</option>
            </p>
            @endforeach
          </select>
        </td>
        <td><button onclick="check('{{$skill_id}}')">交換</button></td>
      </tr>
    </tbody>
  </table>
</div>
{{$myskills}}
<script>
  function check(skill_id) {
    var my_skill_id = $('#mySelect').val();

    var data = {
      my_skill_id,
      point_id: skill_id,
    }
    $.ajax({
        method: "POST",
        url: "/trades",
        dataType: 'json',
        data
      })
      .done(function(msg) {
        console.log(msg)
      });
  }
</script>
@endsection