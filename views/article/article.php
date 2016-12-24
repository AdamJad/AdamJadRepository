<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
<?php

$article = $data;
echo $article->getTitle();
echo $article->getAbstract();
echo $article->getContent();
echo $article->getCategory();
?>
</body>
</html>