<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>게시판 목록</title>
    <style>
        body {
            margin-top: 50px;
        }
        table {
            margin: auto;
            border-collapse: collapse;
        }

        th:nth-child(1) {
            width: 10px;
        }

        th:nth-child(2) {
            width: 50%;
        }

        th, td {
            border: 1px solid #000000;
            width: 100px;
            height: 50px;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #bebebe;
        }

        td {
            background-color: #ebebeb;
        }

        #newPost {
            background-color: white;
            text-align: right;
            border-color: white;
        }

    </style>
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
            <td><a href="{{ route('boards.show', $board) }}">{{ $board->title }}</a></td>
            <td>{{ $board->hit }}</td>
            <td>{{ $board->created_at->format('Y-m-d') }}</td>
        </tr>

        <tr>
            <td colspan="4" id="newPost"><a href="{{ route('boards.create') }}">새 글 작성</a></td>
        </tr>
    </tbody>
    @endforeach

</table>
</body>
</html>

