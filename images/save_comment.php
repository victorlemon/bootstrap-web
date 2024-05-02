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

// 接收POST请求中的评论数据
$data = json_decode(file_get_contents("php://input"));

$name = $mysqli->real_escape_string($data->name);
$email = $mysqli->real_escape_string($data->email);
$comment = $mysqli->real_escape_string($data->comment);

// 将评论数据插入到数据库中
$sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";

if ($mysqli->query($sql) === TRUE) {
    // 返回成功保存的评论数据
    $response = [
        "name" => $name,
        "email" => $email,
        "comment" => $comment
    ];
    echo json_encode($response);
} else {
    echo "保存评论时出错：" . $mysqli->error;
}

$mysqli->close();
?>