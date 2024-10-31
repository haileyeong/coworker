<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>custom 새 글 작성</title>

</head>
<body>
<table>
    <tbody>
    <form action="{{ route('custom.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">제목:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="content">내용:</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <button type="submit">저장</button>
    </form>
    <button onclick="window.location.href='/'">취소</button>
</table>
</body>
</html>

