<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "040122";
$dbname = "dormitory";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
  die("连接失败：" . $conn->connect_error);
}

// 获取请求参数
$name = $_POST["name"];

// 删除宿管信息
$sql = "DELETE FROM dormitory_managers WHERE name = '$name'";
$result = $conn->query($sql);

// 关闭数据库连接
$conn->close();
?>
