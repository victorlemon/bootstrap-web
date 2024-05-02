<?php
$host = "127.0.0.1";
$db_username = "www_xyz1832_cn";
$db_password = "w7F7hfTiam";
$db_name = "www_xyz1832_cn";

// 创建数据库连接
$mysqli = new mysqli($host, $db_username, $db_password, $db_name);

if ($mysqli->connect_error) {
    die("连接数据库失败：" . $mysqli->connect_error);
}

// 查询数据库中的评论
$sql = "SELECT * FROM comments";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="comment">';
        echo $row["name"] . " (" . $row["email"] . "): " . $row["comment"];
        echo '</div>';
    }
} else {
    echo "还没有评论。";
}

$mysqli->close();
?>