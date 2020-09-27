<table>
    <thead>
        <th>Id</th>
        <th>Name</th>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><a href="<?= base_url("user/show?id={$user['id']}") ?>">Chi Tiet</a></td>
            <td><?= load_css("css") ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>