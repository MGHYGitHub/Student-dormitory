<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>宿管信息</title>
    <link rel="stylesheet" href="/css/dorm-managers.css">
</head>
<body>
<nav>
  <ul>
    <li><a href="/index.html">主页</a></li>
    <li><a href="/other/student.php">学生管理</a></li>
    <li><a href="/other/dormitory.php">宿舍管理</a></li>
    <li><a href="/other/dorm-managers.php">宿舍楼管</a></li>
  </ul>
</nav>
<div class="container">
    <h2>宿管信息</h2>
    <a href="/increase/add-dorm-manager.php" class="add-btn">添加宿管</a>
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

    // 查询宿管信息
    $sql = "SELECT name, position, contact AS phone, duty_time AS time FROM dormitory_managers";
    $result = $conn->query($sql);

    // 动态生成宿管信息
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="dormitory_managers">';
            echo '<h3>' . $row["name"] . '</h3>';
            echo '<p>职务：' . $row["position"] . '</p>';
            echo '<p>联系方式：' . $row["phone"] . '</p>';
            echo '<p>任班时间：' . $row["time"] . '</p>';
            echo '<button class="delete-btn" data-name="' . $row["name"] . '">删除</button>';
            echo '<a class="edit-btn" href="/edit/edit.php?name=' . $row["name"] . '">编辑</a>';
            echo '</div>';
        }
    } else {
        echo '暂无宿管信息';
    }

    // 关闭数据库连接
    $conn->close();
    ?>
</div>
<script>
    // 获取所有删除按钮
    const deleteBtns = document.querySelectorAll('.delete-btn');

    // 监听所有删除按钮的点击事件
    deleteBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // 获取该宿管的姓名
            const name = btn.getAttribute('data-name');

            // 弹出确认框
            const confirmed = confirm(`确定要删除 ${name} 的信息吗？`);

            if (confirmed) {
                // 向服务器发送AJAX请求，删除该宿管信息
                const xhr = new XMLHttpRequest();
                xhr.open('DELETE', `/delete/delete.php?name=${name}`);
                xhr.send();

                // 从页面中删除该宿管信息
                btn.parentElement.remove();
            }
        });
    });
</script>
</body>
</html>
