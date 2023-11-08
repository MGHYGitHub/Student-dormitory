<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>宿舍管理</title>
    <link rel="stylesheet" href="/css/dormitory.css">
</head>
<body>
    <div class="header">
        <h1>学生管理系统</h1>
        <!-- <a href="#">退出登录</a> -->
    </div>
    <div class="nav">
        <a href="/index.html">主页</a>
        <a href="/other/student.php">学生管理</a>
        <a href="/other/dormitory.php">宿舍管理</a>
        <a href="/other/dorm-managers.php">宿舍楼管</a>
    </div>
    <div class="content">
        <h2>宿舍列表</h2>
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

            // 处理修改宿舍状态请求
            if (isset($_GET['action']) && $_GET['action'] == 'change_status' && isset($_GET['dorm_number'])) {
                $dorm_number = $_GET['dorm_number'];
                $sql = "UPDATE dormitories SET status='可用' WHERE dorm_number='$dorm_number'";
                if ($conn->query($sql) === TRUE) {
                    echo "<p>宿舍状态修改成功</p>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }

            // 显示宿舍列表
            $sql = "SELECT * FROM dormitories";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>宿舍号</th><th>楼编号</th><th>床位总数</th><th>剩余床位数</th><th>状态</th><th>操作</th></tr>";
                while($row = $result->fetch_assoc()) {
                    // 判断宿舍状态
                    $status = $row["remaining_beds"] > 0 ? "可用" : "已满";
                    echo "<tr><td>" . $row["dorm_number"] . "</td><td>" . $row["building_number"] . "</td><td>" . $row["total_beds"] . "</td><td>" . $row["remaining_beds"] . "</td><td>" . $status . "</td><td><button class='edit-btn' onclick=\"location.href='/edit/edit_dormitory.php?dorm_number=" . $row["dorm_number"] . "'\">编辑</button><button class='delete-btn' onclick=\"if(confirm('确定删除该宿舍吗？')){location.href='dormitory.php?action=delete&dorm_number=" . $row["dorm_number"] . "'}\">删除</button></td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>没有宿舍信息</p>";
            }
            $conn->close();
        ?>

        <button class="add-btn" onclick="location.href='/increase/add_dormitory.php'">添加宿舍</button>
    </div>
</body>
</html>
