<!-- app/Views/rating_view.php -->
<form action="/rating/submitRating" method="post">
    <?= csrf_field() ?>
    <label for="rating">Berikan rating (1-5):</label>
    <select name="rating" id="rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    
    <input type="hidden" name="user_id" value="<?= $user_id ?>"> <!-- Misalnya user id sudah tersedia -->
    <button type="submit">Kirim</button>
</form>
