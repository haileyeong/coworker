<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>게시판 상세보기</title>
    <link rel="stylesheet" href={{ asset('css/boards/show.css') }}>
    <script>
        function back() {
            window.location.href = "/board";
        }
    </script>
</head>
<body>
<form action="{{ route('boards.update', $board->id) }}" method="POST">
    @csrf
    @method('PUT')
<table>
    <tr>
        <th>번호</th>
        <td>{{ $board -> id }}</td>
    </tr>
    <tr>
        <th>작성일</th>
        <td>{{ $board -> created_at -> format('Y-m-d H:i') }}</td>
    </tr>
    <tr>
        <th>제목</th>
        <td><input type="text" name="title" value="{{ $board->title }}" required></td>
    </tr>
    <tr>
        <th>조회수</th>
        <td>{{ $board -> hit }}</td>
    </tr>
    <tr>
        <th colspan="2">상세내용</th>
    </tr>
    <tr>
        <td colspan="2" id="content"><input type="text" name="content" value="{{ $board->content }}" required></td>
    </tr>
</table>
<ul id="button-container">
    <li>
        <button type="button" onclick="back()">뒤로가기(취소)</button>
    </li>

    <li>
        <button type="submit">저장</button>
    </li>
</ul>
</form>

</body>
</html>
