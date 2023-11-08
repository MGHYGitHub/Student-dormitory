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

// 处理表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $position = $_POST["position"];
    $phone = $_POST["phone"];
    $time = $_POST["time"];

    // 将新宿管信息添加到数据库中
    $sql = "INSERT INTO dormitory_managers (name, position, contact, duty_time)
            VALUES ('$name', '$position', '$phone', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "新宿管信息已添加成功！";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
header("Location: /other/dorm-managers.php");
exit;
?>
