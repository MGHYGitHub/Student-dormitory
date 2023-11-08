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

// 获取表单数据
$id = $_POST['id'];
$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$gender = $_POST['gender'];
$department = $_POST['department'];
$major = $_POST['major'];
$phone = $_POST['phone'];
$dormitory_id = $_POST['dormitory_id'];
$checkin_time = $_POST['checkin_time'];
$status = $_POST['status'];

// 更新学生信息
$sql = "UPDATE students SET student_id='$student_id', student_name='$student_name', gender='$gender', department='$department', major='$major', phone='$phone', dormitory_id='$dormitory_id', checkin_time='$checkin_time', status='$status' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "学生信息更新成功！";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: /other/student.php");
exit;
?>
