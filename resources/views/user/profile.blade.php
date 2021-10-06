<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .box {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
    </style>
</head>

<div class="box">
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">姓名</th>
                    <th scope="col">email</th>
                    <th scope="col">會員建立時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{$user->id}}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->created_at}}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>