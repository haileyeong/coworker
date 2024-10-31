<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>custom 상세보기</title>
    <link rel="stylesheet" href={{ asset('css/custom/customShow.css') }}>
    <script>
        function back() {
            window.location.href = "/custom-board";
        }
    </script>
</head>
<body>
<table>
    <tr>
        <th>번호</th>
        <td>{{ $board -> id }}</td>
    </tr>
    <tr>
        <th>작성일</th>
        <td>{{ $board -> created_at -> format('Y-m-d') }}</td>
    </tr>
    <tr>
        <th>제목</th>
        <td>{{ $board -> title }}</td>
    </tr>
    <tr>
        <th>조회수</th>
        <td>{{ $board -> hit }}</td>
    </tr>
    <tr>
        <th colspan="2">상세내용</th>
    </tr>
    <tr>
        <td colspan="2" id="content">{{ $board -> content }}</td>
    </tr>
</table>

<ul id="button-container">
    <li>
        <button onclick="back()">뒤로가기(취소)</button>
    </li>
    <li>
        <button>수정</button>
    </li>
    <form action="{{ route('custom.destroy', $board->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <li>
            <button type="submit" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</button>
        </li>
    </form>
</ul>

</body>
</html>
