<?php
$username = $_POST['username'];
$password = $_POST['password'];

// 进行登录验证
if ($username === 'admin' && $password === '123456') {
    echo 'success';
} else {
    echo 'failure';
}
?>
