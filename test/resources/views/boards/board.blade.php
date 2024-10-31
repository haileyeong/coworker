<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" href={{ asset('css/boards/board.css') }}>
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
            <td><a href="{{ route('boards.show', $board->id) }}">{{ $board->title }}</a></td>
            <td>{{ $board->hit }}</td>
            <td>{{ $board->created_at->format('Y-m-d') }}</td>
        </tr>

{{--        <tr>--}}
{{--            <td colspan="4" id="newPost"><a href="/new">새 글 작성</a></td>--}}
{{--        </tr>--}}
    </tbody>
    @endforeach

</table>
</body>
</html>

