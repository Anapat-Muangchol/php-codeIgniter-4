<h2><?= esc($title) ?></h2>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/create" method="post">
    <?= csrf_field(); ?>

    <label for="title">Title</label>
    <input type="input" name="title">
    <br>

    <label for="body">Body</label>
    <textarea name="body" cols="30" rows="10"></textarea>
    <br>

    <input type="submit" name="submit" value="Create news item">
</form>
<br>
<hr>
<a href="/news">Go back</a>
<hr>