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

// 获取表单数据并进行验证和过滤
$student_id = filter_var($_POST['student_id'], FILTER_SANITIZE_STRING);
$student_name = filter_var($_POST['student_name'], FILTER_SANITIZE_STRING);
$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
$department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
$major = filter_var($_POST['major'], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
$dormitory_id = filter_var($_POST['dormitory_id'], FILTER_SANITIZE_STRING);
$checkin_time = filter_var($_POST['checkin_time'], FILTER_SANITIZE_STRING);
$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

// 格式化和转义表单数据
$student_id = $conn->real_escape_string($student_id);
$student_name = $conn->real_escape_string($student_name);
$gender = $conn->real_escape_string($gender);
$department = $conn->real_escape_string($department);
$major = $conn->real_escape_string($major);
$phone = $conn->real_escape_string($phone);
$dormitory_id = $conn->real_escape_string($dormitory_id);
$checkin_time = $conn->real_escape_string($checkin_time);
$status = $conn->real_escape_string($status);

// 插入数据到数据库
$sql = "INSERT INTO students (student_id, student_name, gender, department, major, phone, dormitory_id, checkin_time, status)
        VALUES ('$student_id', '$student_name', '$gender', '$department', '$major', '$phone', '$dormitory_id', '$checkin_time', '$status')";
if ($conn->query($sql) === TRUE) {
    header("Location: /other/student.php");
} else {
    echo "添加失败：" . $conn->error;
}
$conn->close();
?>
