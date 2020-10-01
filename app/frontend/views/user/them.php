<?php
if (isset($_SESSION["Check_mail"])) {
    echo "<h1 style='color:red'>Email đã tồn tại</h1>";
}
unset($_SESSION["Check_mail"]);
?>
<h1>Đây là trang thêm</h1>
<form action="<?= base_url("user/them_user") ?>" method="post">
    <label for="">Name:</label>
    <input type="text" name="name" id=""><br><br>
    <label for="">Email:</label>
    <input type="text" name="email" id=""><br><br>
    <input type="submit" value="Thêm" name="them">
</form>