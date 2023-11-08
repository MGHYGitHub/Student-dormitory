<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑宿舍</title>
    <link rel="stylesheet" href="/css/dormitory.css">
</head>
<body>
    <div class="header">
        <h1>学生管理系统</h1>
        <!-- <a href="#">退出登录</a> -->
    </div>
    <div class="nav">
        <a href="/other/student.php">学生管理</a>
        <a href="/other/dormitory.php">宿舍管理</a>
        <a href="/other/dorm-managers.php">宿舍楼管</a>
        <a href="/index.html">主页</a>
    </div>
    <div class="content">
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
            // 获取表单数据
            $dorm_number = $_POST["dorm_number"];
            $building_number = $_POST["building_number"];
            $total_beds = $_POST["total_beds"];
            $remaining_beds = $_POST["remaining_beds"];
            $status = $_POST["status"];
            // 更新数据库中的数据
            $sql = "UPDATE dormitories SET building_number='$building_number', total_beds=$total_beds, remaining_beds=$remaining_beds, status='$status' WHERE dorm_number='$dorm_number'";
            if ($conn->query($sql) === TRUE) {
                echo "<p>宿舍信息更新成功</p>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // 显示表单
            $dorm_number = $_GET["dorm_number"];
            $sql = "SELECT * FROM dormitories WHERE dorm_number='$dorm_number'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<form class='form' method='POST' action='/edit/edit_dormitory.php'>";
                echo "<input type='hidden' name='dorm_number' value='" . $row["dorm_number"] . "'>";
                echo "<label for='building_number'>楼编号：</label>";
                echo "<input type='text' id='building_number' name='building_number' value='" . $row["building_number"] . "'>";
                echo "<label for='total_beds'>床位总数：</label>";
                echo "<input type='text' id='total_beds' name='total_beds' value='" . $row["total_beds"] . "'>";
                echo "<label for='remaining_beds'>剩余床位数：</label>";
                echo "<input type='text' id='remaining_beds' name='remaining_beds' value='" . $row["remaining_beds"] . "'>";
                echo "<label for='status'>状态：</label>";
                echo "<input type='text' id='status' name='status' value='" . $row["status"] . "'>";
                echo "<button type='submit'>更新</button>";
                echo "</form>";
            } else {
                echo "<p>没有找到该宿舍信息</p>";
            }
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
