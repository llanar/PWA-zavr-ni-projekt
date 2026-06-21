<?php
session_start();
include 'insert.php';

$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];

$image = $_FILES['pphoto']['name'];

move_uploaded_file(
    $_FILES['pphoto']['tmp_name'],
    'images-uploaded/' . $image
);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELT | <?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <?php include 'header.php'; ?>
    </header>

<section class="article-page">

    <p class="category">
        <?php echo strtoupper($category); ?>
    </p>

    <h1 class="article-title">
        <?php echo $title; ?>
    </h1>

    <p class="article-date">
        Stand: <?php echo date("d.m.Y."); ?>
    </p>

    <img
        class="article-image"
        src="<?php echo 'images-uploaded/' . $image; ?>"
        alt="<?php echo $title; ?>"
    >

    <section class="article-about">
        <p>
            <?php echo $about; ?>
        </p>
    </section>

    <section class="article-content">
        <p>
            <?php echo nl2br($content); ?>
        </p>
    </section>

</section>

<footer>
    <h1>WELT</h1>
</footer>

</body>
</html>