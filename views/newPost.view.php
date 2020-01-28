<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="storePost.php" method="get">
    <input type="hidden" name="id" id="id">
    <label for="description">Header:</label>
    <input type="text" name="description" id="description" required>
    <label for="content">Content:</label>
    <input type="text" name="content" id="content" required>
    <input type="submit" value="create post!" name="btnNewPost">
</form>
</body>
</html>
