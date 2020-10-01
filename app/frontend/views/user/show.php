<form action="<?= base_url("user/update") ?>" method="post">
<?= $user['name'] ?> 	    <label for="">ID:</label>
    
    <label for="">Name:</label>
    <input type="text" name="name" id="" value="<?= $user['name'] ?>"><br><br>
    <label for="">Email:</label>
    <input type="text" name="email" id="" value="<?= $user['email'] ?>"><br><br>
    <label for="">Ngày tạo:</label>
    <input type="text" name="ngay_tao" id="" value="<?= $user['created_at'] ?>" readonly><br><br>
    <input type="submit" value="Sửa" name="update">
</form> 