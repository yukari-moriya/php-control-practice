<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>
<body>

<?php
//学生データ
$students = [
    ["name" => "田中太郎", "score" => 85],
    ["name" => "佐藤花子", "score" => 92],
    ["name" => "鈴木一郎", "score" => 78],
    ["name" => "高橋美咲", "score" => 65],
    ["name" => "伊藤健太", "score" => 58],
];

//成績判定
function getGrade($score) {
if ($score >= 90) {
 return ["grade" => "A", "status" => "優秀"];
} elseif ($score >= 80) {
 return ["grade" => "B", "status" => "良好"];
} elseif ($score >= 70) {
 return ["grade" => "C", "status" => "普通"];
} elseif ($score >= 60){
 return ["grade" => "D", "status" => "要努力"];
} else {
 return ["grade" => "F", "status" => "不合格"];
}
}

$pass_count = 0;
$fail_count = 0;
$total_score = 0;

// 個別成績の表示
echo "【個別成績】";
echo "<tr><th>名前</th><th>点数</th><th>評価</th><th>判定</th></tr>";
echo "<table>";

foreach ($students as $student) {
    $name = $student["name"];
    $score = $student["score"];
    $result = getGrade($score);
    $grade = $result["grade"];
    $status = $result["status"];

    $total_score += $score;
    if ($score >= 60) {
        $pass_count++;
    } else {
        $fail_count++;
    }

// テーブル行の表示
            echo "<tr>";
            echo "<td>{$name}</td>";
            echo "<td>{$score}点</td>";
            echo "<td class='grade-{$grade}'>{$grade}</td>";
            echo "<td>{$status}</td>";
            echo "</tr>";
        }

echo "</table>";

// 平均点

$average = $total_score / count($students);

// 統計情報
        echo "【統計情報】";
        echo "合格者数: {$pass_count}人";
        echo "不合格者数: {$fail_count}人";
        echo "平均点: " . number_format($average, 1) . "点";
?>

</body>
</html>