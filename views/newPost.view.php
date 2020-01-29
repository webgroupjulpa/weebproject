<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>New Post</title>
</head>
<body>
<form action="../controller/storePost.php" method="post">
    <input type="hidden" name="id" id="id">
    <label for="description">Header:</label>
    <input type="text" name="description" id="description" required>
    <label for="content">Content:</label>
    <textarea name="content" id="content"></textarea>
    <input type="submit" value="create post!" name="btnNewPost">
</form>
<script src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script src="../tiny.js"></script>
</body>
</html>
