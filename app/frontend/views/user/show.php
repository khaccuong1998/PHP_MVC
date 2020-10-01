<?php
if (isset($_SESSION["Check_mail"])) {
    echo "<h1 style='color:red'>Email đã tồn tại</h1>";
}
unset($_SESSION["Check_mail"]);
?>
<h2>Show user</h2>
<form action="<?= base_url("user/sua") ?>" method="post">
    <label for="">ID:</label>
    <input type="text" name="id" id="" value="<?= $user['id'] ?>" readonly><br><br>
    <label for="">Name:</label>
    <input type="text" name="name" id="" value="<?= $user['name'] ?>"><br><br>
    <label for="">Email:</label>
    <input type="text" name="email" id="" value="<?= $user['email'] ?>"><br><br>
    <label for="">Ngày tạo:</label>
    <input type="text" name="ngay_tao" id="" value="<?= $user['created_at'] ?>" readonly><br><br>
    <input type="submit" value="Sửa" name="sua">
</form>