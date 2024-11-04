<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2주차</title>
    <link rel="stylesheet" href="{{ asset('css/boards/index.css') }}">

    <script>
        function login() {
            window.location.href = "/login";
        }
        function register() {
            window.location.href = "/register";
        }
    </script>
</head>
<body>
<ul id="button-container">
    <li>
        <button onclick="login()">로그인</button>
    </li>
    <li>
        <button onclick="register()">회원가입</button>
    </li>
</ul>

</body>
</html>

