<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>添加学生信息</title>
    <link rel="stylesheet" href="/css/add_student.css">
</head>
<body>
    <h1>添加学生信息</h1>
    <form method="post" action="/increase/insert_student.php">
        <div class="form-group">
            <label for="student_id">学号：</label>
            <input type="text" name="student_id" id="student_id" required>
        </div>
        <div class="form-group">
            <label for="student_name">姓名：</label>
            <input type="text" name="student_name" id="student_name" required>
        </div>
        <div class="form-group option-group">
            <label>性别：</label>
            <input type="radio" name="gender" id="male" value="男" required>
            <label for="male">男</label>
            <input type="radio" name="gender" id="female" value="女" required>
            <label for="female">女</label>
        </div>
        <div class="form-group">
            <label for="department">院系：</label>
            <input type="text" name="department" id="department" required>
        </div>
        <div class="form-group">
            <label for="major">专业：</label>
            <input type="text" name="major" id="major" required>
        </div>
        <div class="form-group">
            <label for="phone">电话：</label>
            <input type="text" name="phone" id="phone" required>
        </div>
        <div class="form-group">
            <label for="dormitory_id">宿舍号：</label>
            <input type="text" name="dormitory_id" id="dormitory_id" required>
        </div>
        <div class="form-group">
            <label for="checkin_time">入住时间：</label>
            <input type="text" name="checkin_time" id="checkin_time" required>
        </div>
        <div class="form-group option-group">
            <label>状态：</label>
            <input type="radio" name="status" id="checkin" value="已入住" required>
            <label for="checkin">已入住</label>
            <input type="radio" name="status" id="checkout" value="未入住" required>
            <label for="checkout">未入住</label>
        </div>
        <div class="form-group submit">
            <input type="submit" value="添加">
            <input type="reset" value="重置">
        </div>
    </form>
</body>
</html>
