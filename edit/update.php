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

// 获取要更新的宿管信息
$name = $_POST["name"];
$new_name = $_POST["new_name"];
$position = $_POST["position"];
$phone = $_POST["phone"];
$time = $_POST["time"];

// 更新宿管信息
$sql = "UPDATE dormitory_managers SET name='$new_name', position='$position', contact='$phone', duty_time='$time' WHERE name='$name'";
if ($conn->query($sql) === TRUE) {
    echo "宿管信息更新成功";
} else {
    echo "宿管信息更新失败：" . $conn->error;
}

// 关闭数据库连接
$conn->close();
header("Location: /other/dorm-managers.php");
exit;
?>