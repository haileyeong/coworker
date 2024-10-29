<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>구구단 표</title>
</head>
<body>
    <?php
    echo "<h3>1 - 100 까지 수 중에서 4와 6의 공배수</h3>";
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo $i . ", ";
        }
    }
    echo "<hr>";

    echo "<h3>구구단 출력</h3>";
    for ($i = 1; $i <= 9; $i += 3) {
        for ($j = 1; $j <= 9; $j++) {
            for ($k = $i; $k < $i + 3; $k++) {
                if ($k <= 9) {
                    echo $k . " x " . $j . " = " . ($k * $j) . "\t";
                }
            }
            echo "<br>";
        }
        echo "<br>";
    }

    ?>
</body>
</html>

