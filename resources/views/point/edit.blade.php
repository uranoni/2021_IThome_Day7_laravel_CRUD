<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="POST">
        <!-- @csrf -->


        <label for="inputTitle" class="sr-only">分數</label>
        <input type="hidden" id="point" name="" value="{{$id}}">
        <input type="text" id="inputTitle" name="title" class="form-control" placeholder="請給零~五分" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="createskill">送出評分</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021 iThome 鐵人賽</p>
    </form>

    <script>
        $(document).ready(function() {
            $("#createskill").on('click', function() {
                var data = {
                    point: $('#inputTitle').val(),
                    id: $('#point').val()
                }
                $.ajax({
                        method: "PATCH",
                        url: "/points/" + data.id,
                        dataType: 'json',
                        data
                    })
                    .done(function(msg) {
                        console.log(msg)
                    });
            });
        });
    </script>
</body>