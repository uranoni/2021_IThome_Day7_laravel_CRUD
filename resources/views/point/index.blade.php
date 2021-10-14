<head>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>標題</th>
          <th>使用者ID</th>
          <th>技能評分</th>
        </tr>
      </thead>
      <tbody>
        @foreach($skills as $skill )
        <tr>
          <td>{{$skill->id}}</td>
          <td>{{$skill->title}}</td>
          <td>{{$skill->user_id}}</td>
          <td><button type="button" class="btn btn-primary" onclick="myFunction('{{$skill->id}}','{{$skill->user_id}}')">進入評分</button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

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
</script>