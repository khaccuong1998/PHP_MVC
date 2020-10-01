<?php
if (isset($_SESSION["them"])) {
    echo "<h1 style='color:green'>Insert successful</h1>";
}
if (isset($_SESSION["xoa"])) {
    echo "<h1 style='color:red'>Delete successful</h1>";
}
if (isset($_SESSION["sua"])) {
    echo "<h1 style='color:blue'>Update successful</h1>";
}
session_destroy();
?>
<table cellspacing="0" cellpadding="5">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Ngày Tạo</th>
        <th colspan="2"><a href="<?= base_url("user/them") ?>">Thêm</a></th>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
        <tr align="center">
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['created_at'] ?></td>
            <td><a href="<?= base_url("user/show?id={$user['id']}") ?>">Sửa</a></td>
            <td><a href="<?= base_url("user/xoa?id={$user['id']}") ?>"
                    onclick="return confirm('Bạn có muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>