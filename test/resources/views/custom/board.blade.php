<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>custom 게시판</title>
    <link rel="stylesheet" href={{ asset('css/custom/board.css') }}>
    <script>
        function back() {
            window.location.href = "/";
        }

        function newPost() {
            window.location.href = "{{ route('custom.new') }}";
        }
    </script>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>번호</th>
        <th>제목</th>
        <th>조회수</th>
        <th>작성일</th>
    </tr>
    </thead>

    @foreach ($boards as $board)
        <tbody>
        <tr>
            <td>{{ $board->id }}</td>
            <td><a href="{{ route('custom.show', $board->id) }}">{{ $board->title }}</a></td>
            <td>{{ $board->hit }}</td>
            <td>{{ $board->created_at->format('Y-m-d') }}</td>
        </tr>
        </tbody>
    @endforeach

</table>
<ul id="button-container">
    <li>
        <button type="button" onclick="back()">뒤로가기(취소)</button>
    </li>

    <li>
        <button onclick="newPost()">새 글 작성</button>
    </li>
</ul>
</body>
</html>

