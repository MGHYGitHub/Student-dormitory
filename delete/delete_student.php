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
    // 获取要删除的学生 ID
    $id = $_POST["id"];
    // 删除学生数据
    $sql = "DELETE FROM students WHERE id = " . $id;
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
?>
