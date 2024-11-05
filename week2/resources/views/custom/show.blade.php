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

        function update(id) {
            window.location.href = `/custom-update/${id}`;
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
        <td>{{ $board -> created_at -> format('Y-m-d H:i') }}</td>
    </tr>
    <tr>
        <th>작성자</th>
        <td>{{ $board -> user -> nickname }}</td>
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

    @if (Auth::check() && Auth::id() === $board->user_id)
    <li>
        <button onclick="update({{ $board->id }})">수정</button>
    </li>
    <form action="{{ route('custom.destroy', $board->id) }}" method="POST" style="display:inline;">
{{--        @csrf--}}
        @method('DELETE')
        <li>
            <button type="submit" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</button>
        </li>
    </form>
    @endif
</ul>

</body>
</html>
