<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理</title>
    <link rel="stylesheet" href="/css/student.css">
    <script>
        // 编辑学生信息
        function editStudent(id) {
            window.location.href = "/edit/edit_student.php?id=" + id;
        }
        // 删除学生信息
        function deleteStudent(id) {
            if (confirm("确定删除该学生信息吗？")) {
                window.location.href = "/delete/delete_student.php?id=" + id;
            }
        }
    </script>
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
        <h2>学生列表</h2>
        <table>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>院系</th>
                <th>专业</th>
                <th>电话</th>
                <th>宿舍编号</th>
                <th>入住时间</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
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
                // 查询学生信息
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["student_id"] . "</td>";
                        echo "<td>" . $row["student_name"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["department"] . "</td>";
                        echo "<td>" . $row["major"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["dormitory_id"] . "</td>";
                        echo "<td>" . $row["checkin_time"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>";
                        echo "<button type='button' onclick='editStudent(" . $row["id"] . ")'>编辑</button>";
                        echo "<button type='button' onclick='deleteStudent(" . $row["id"] . ")'>删除</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>未找到学生信息。</td></tr>";
                }
                $conn->close();
            ?>
        </table>
        <button onclick="window.location.href='/increase/add_student.php'">添加学生</button>
    </div>
</body>
</html>
