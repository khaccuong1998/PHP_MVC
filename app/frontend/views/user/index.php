<!-- <div class="container">
<div class="col-md-12">
<form action="" method="post">
<label for="">Name</label>
<input type="text" id="name"><br><br>
<label for="">Email</label>
<input type="email" name="" id="email"><br><br>
<input type="button" value="Insert" id="btn_insert" class="btn-success">
</form>
</div>
</div>  
 <script type="text/javascript">
    $('#btn_insert').on('click',function(){
        var name= $('#name').val();
        var email= $('#email').val();
        if(name =='' ||email == '' ){
            alert('Không được bỏ trống các trường');
        }else{
            $.ajax({
                url:"app/frontend/controllers/User_Controller.php",
                method: "POST",
                data:{name:name,email:email},
                success:function(data){
                    alert('insert thành công');
                }
            });
        }

    });
</script> --> 
<?php
 if(isset($_SESSION["add"])){
    echo "<h1>Insert successful</h1>";
}
if(isset($_SESSION["del"])){
    echo "<h1>Delete successful</h1>";
}
if(isset($_SESSION["update"])){
    echo "<h1>Update successful</h1>";
}
session_destroy();
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
a{
    margin-left:10px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<a href="<?= base_url("user/add") ?>"><button class="btn-sucess">Thêm mới user</button></a> <br><br>
<table cell="0" cell="5">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
        <!-- <td>Ngày Tạo</td>
        <td>Ngày chỉnh sửa  </td> -->
        <td></td>
    </tr>
    <tbody>
        <?php foreach ($users as $user) : ?>
        <tr >
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <!-- <td><?= $user['created_at'] ?></td>
            <td><?= $user['updated_at'] ?></td> -->
            <td>
            <a href="<?= base_url("user/show?id={$user['id']}") ?>">Sửa</a>
            <a href="<?= base_url("user/xoa?id={$user['id']}") ?>">Xóa</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
