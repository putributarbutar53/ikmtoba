<!-- admin/ratings.php -->

<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<h2>Daftar Rating Pengguna</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Rating</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ratings as $rating): ?>
        <tr>
            <td><?= $rating['id'] ?></td>
            <td><?= $rating['user_id'] ?></td>
            <td><?= $rating['rating'] ?></td>
            <td><?= $rating['created_at'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
