<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加宿舍</title>
    <link rel="stylesheet" href="/css/add_dormitory.CSS">
</head>
<body>
    <div class="header">
        <h1>学生管理系统</h1>
        <!-- <a href="#">退出登录</a> -->
    </div>
    <div class="nav">
        <a href="/other/student.php">学生管理</a>
        <a href="/other/dormitory.php">宿舍管理</a>
        <a href="/other/dorm-managers.html">宿舍楼管</a>
        <a href="index.html">主页</a>
    </div>
    <div class="content">
        <h2>添加宿舍</h2>
        <form action="/increase/add_dormitory.php" method="post">
            <label for="dorm_number">宿舍号：</label>
            <input type="text" id="dorm_number" name="dorm_number" required>
            <label for="building_number">楼编号：</label>
            <input type="text" id="building_number" name="building_number" required>
            <label for="total_beds">床位总数：</label>
            <input type="number" id="total_beds" name="total_beds" required>
            <label for="remaining_beds">剩余床位数：</label>
            <input type="number" id="remaining_beds" name="remaining_beds" required>
            <button type="submit" name="submit">添加</button>
        </form>

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

        // 处理添加宿舍请求
        if (isset($_POST['submit'])) {
            $dorm_number = $_POST['dorm_number'];
            $building_number = $_POST['building_number'];
            $total_beds = $_POST['total_beds'];
            $remaining_beds = $_POST['remaining_beds'];
            $status = $remaining_beds > 0 ? "可用" : "已满";
            $sql = "INSERT INTO dormitories (dorm_number, building_number, total_beds, remaining_beds, status) VALUES ('$dorm_number', '$building_number', '$total_beds', '$remaining_beds', '$status')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>宿舍添加成功</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>