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


        <label for="inputTitle" class="sr-only">技能名稱</label>
        <input type="text" id="inputTitle" name="title" class="form-control" placeholder="title name" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="createskill">建立技能</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021 iThome 鐵人賽</p>
    </form>

    <script>
        $(document).ready(function() {
            $("#createskill").on('click', function() {
                var data = {
                    title: $('#inputTitle').val(),
                }
                $.ajax({
                        method: "POST",
                        url: "/skills",
                        dataType: 'json',
                        data
                    })
                    .done(function(msg) {
                        window.location.href = '/skills';
                    });
            });
        });
    </script>
</body>