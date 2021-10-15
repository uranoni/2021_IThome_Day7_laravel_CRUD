<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<div class="container">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/') }}">
                <H2>首頁</H2>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/skills') }}">
                <H2>全技能列表</H2>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('profile') }}">
                <H2>個人檔案</H2>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/points')}}">
                <h2>評分系統</h2>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/trades/record')}}">
                <h2>訂單編號</h2>
            </a>
        </li>
        <li class=" nav-item">
            <a class="nav-link" href="{{ url('/skills/tree')}}">
                <h2>技能樹</h2>
            </a>
        </li>
    </ul>
    <div class="container">
        @yield('content')
    </div>
</div>