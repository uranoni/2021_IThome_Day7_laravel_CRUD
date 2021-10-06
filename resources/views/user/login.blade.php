<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body class="text-center">
    <form class="form-signin" action="/test" method="POST">
        <!-- @csrf -->
        <img class="mb-4" src="https://images.unsplash.com/photo-1495360010541-f48722b34f7d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=436&q=80" alt="" width="72">
        <h1 class="h3 mb-3 font-weight-normal">請輸入使用者名稱及密碼登入</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="passowrd" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="login">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021 iThome 鐵人賽</p>
    </form>

    <script>
        $(document).ready(function() {
            $("#login").on('click', function() {
                var data = {
                    email: $('#inputEmail').val(),
                    password: $('#inputPassword').val()
                }
                $.ajax({
                        method: "POST",
                        url: "/login",
                        dataType: 'json',
                        data
                    })
                    .done(function(msg) {
                        const d = new Date();
                        const exdays = 10;
                        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                        let expires = "expires=" + d.toUTCString();
                        document.cookie = "token" + "=" + msg.token + ";" + expires + ";" + "path=/";
                        // localStorage.setItem('accessToken', msg.token);
                        window.location.href = '/profile';
                    });
            });
        });
    </script>
</body>