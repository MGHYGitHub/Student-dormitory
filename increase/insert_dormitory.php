<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "040122";
$dbname = "dormitory";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// 处理表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dormitory_id = $_POST["dormitory_id"];
    $building_number = $_POST["building_number"];
    $total_beds = $_POST["total_beds"];
    $remaining_beds = $total_beds;
    $status = 1;
    // 向数据库中插入新的宿舍信息
    $sql = "INSERT INTO dormitory (dormitory_id, building_number, total_beds, remaining_beds, status) VALUES ('$dormitory_id', '$building_number', '$total_beds', '$remaining_beds', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>添加成功</p>";
        // 跳转回宿舍管理页面
        header("Location: /other/dormitory.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
