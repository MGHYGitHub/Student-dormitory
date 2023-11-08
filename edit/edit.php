<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑宿管信息</title>
    <link rel="stylesheet" href="/css/dorm-managers.css">
</head>
<body>
<div class="container">
    <h2>编辑宿管信息</h2>
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

    // 获取要编辑的宿管姓名
    $name = $_GET["name"];

    // 查询宿管信息
    $sql = "SELECT name, position, contact AS phone, duty_time AS time FROM dormitory_managers WHERE name='$name'";
    $result = $conn->query($sql);

    // 显示宿管信息表单
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<form method="post" action="/edit/update.php">';
        echo '<input type="hidden" name="name" value="' . $name . '">';
        echo '<label for="name">姓名：</label>';
        echo '<input type="text" id="name" name="new_name" value="' . $row["name"] . '" required><br>';
        echo '<label for="position">职务：</label>';
        echo '<input type="text" id="position" name="position" value="' . $row["position"] . '" required><br>';
        echo '<label for="phone">联系方式：</label>';
        echo '<input type="text" id="phone" name="phone" value="' . $row["phone"] . '" required><br>';
        echo '<label for="time">任班时间：</label>';
        echo '<input type="text" id="time" name="time" value="' . $row["time"] . '" required><br>';
        echo '<button type="submit">保存</button>';
        echo '</form>';
    } else {
        echo '无法获取宿管信息';
    }

    // 关闭数据库连接
    $conn->close();
    ?>
</div>
</body>
</html>
