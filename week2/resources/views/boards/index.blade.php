<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>게시판 목록</title>
    <link rel="stylesheet" href="{{ asset('css/boards/index.css') }}">

    <script>
        function board() {
            window.location.href = "/board";
        }
        function customBoard() {
            window.location.href = "/custom-board";
        }
    </script>
</head>
<body>
<ul id="button-container">
    <li>
        <button onclick="board()">게시판 1</button>
    </li>
    <li>
        <button onclick="customBoard()">게시판 2</button>
    </li>
</ul>

</body>
</html>

