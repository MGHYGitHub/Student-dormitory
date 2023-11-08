<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑学生信息</title>
    <link rel="stylesheet" href="/css/edit_student.css">
</head>
<body>
    <form class="form" method="post" action="/edit/update_student.php">
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
            $sql = "SELECT * FROM students WHERE id=" . $_GET['id'];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<div class='input-group'>";
                echo "<label for='student_id'>学号：</label>";
                echo "<input type='text' id='student_id' name='student_id' value='" . $row['student_id'] . "'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='student_name'>姓名：</label>";
                echo "<input type='text' id='student_name' name='student_name' value='" . $row['student_name'] . "'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='gender'>性别：</label>";
                echo "<select id='gender' name='gender'>";
                echo "<option value='男' " . ($row['gender'] == '男' ? 'selected' : '') . ">男</option>";
                echo "<option value='女' " . ($row['gender'] == '女' ? 'selected' : '') . ">女</option>";
                echo "</select>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='department'>院系：</label>";
                echo "<input type='text' id='department' name='department' value='" . $row['department'] . "'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='major'>专业：</label>";
                echo "<input type='text' id='major' name='major' value='" . $row['major'] . "'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='phone'>电话：</label>";
                echo "<input type='text' id='phone' name='phone' value='" . $row['phone'] . "'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='dormitory_id'>宿舍编号：</label>";
                echo "<input type='text' id='dormitory_id' name='dormitory_id' value='" . $row['dormitory_id'] . "'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='checkin_time'>入住时间：</label>";
                echo "<input type='text' id='checkin_time' name='checkin_time' value='" . $row['checkin_time'] . "'>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<label for='status'>状态：</label>";
                echo "<select id='status' name='status'>";
                echo "<option value='未入住' " . ($row['status'] == '未入住' ? 'selected' : '') . ">未入住</option>";
                echo "<option value='已入住' " . ($row['status'] == '已入住' ? 'selected' : '') . ">已入住</option>";
                echo "</select>";
                echo "</div>";
                echo "<div class='input-group'>";
                echo "<button type='submit'>保存</button>";
                echo "</div>";
            } else {
                echo "<p>未找到该学生信息。</p>";
            }
            $conn->close();
        ?>
    </form>
</body>
</html>
