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

        #back {
            background-color: white;
            text-align: left;
            border-color: white;
        }

    </style>
</head>
<body>
<table>
    <tbody>
    <form>
    <tr>
        <td>제목</td>
        <td><input></td>
    </tr>
    <tr>
        <td>내용</td>
        <td><textarea></textarea></td>
    </tr>
    </form>



        <tr>
            <td id="back"><a href="/">이전으로</a></td>
        </tr>
    </tbody>

</table>
</body>
</html>

