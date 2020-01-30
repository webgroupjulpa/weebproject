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
<form action="../controller/storeEdit.php" method="post">
    <input type="text" id="description" value="<?=$edit['description']?>">
    <textarea name="content" id="content"><?=$edit['content']?></textarea>
    <input type="hidden" id="id" name="id" value="<?=$edit['id']?>">
    <input type="submit" id="btnSubmitEdit" name="btnSubmitEdit" value="confirm edit">
</form>

<script src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script src="../tiny.js"></script>
</body>
</html>