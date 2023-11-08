<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加宿管</title>
    <link rel="stylesheet" href="/css/dorm-managers.css">
</head>
<body>
<div class="container">
    <h2>添加宿管</h2>
    <form method="post" action="/increase/add.php">
        <label for="name">姓名：</label>
        <input type="text" id="name" name="name" required><br>
        <label for="position">职务：</label>
        <input type="text" id="position" name="position" required><br>
        <label for="phone">联系方式：</label>
        <input type="text" id="phone" name="phone" required><br>
        <label for="time">任班时间：</label>
        <input type="text" id="time" name="time" required><br>
        <button type="submit">添加</button>
    </form>
</div>
</body>
</html>
