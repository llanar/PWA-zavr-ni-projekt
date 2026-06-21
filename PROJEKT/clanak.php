<?php
session_start();
include 'connect.php';

$id = (int)$_GET['id'];

$query = "SELECT * FROM vijesti WHERE id=$id";
$result = mysqli_query($dbc, $query);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['naslov']; ?> | WELT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <?php include 'header.php'; ?>
    </header>

    <main class="single-article">
        <section class="article-page">
            <h2 class="article-category">
                <?php echo strtoupper($row['kategorija']); ?>
            </h2>
            <h1 class="article-title">
                <?php echo $row['naslov']; ?>
            </h1>
            <p class="article-date">
                Stand:
                <?php echo date('d.m.Y.', strtotime($row['datum'])); ?>
            </p>
            <img
                src="images-uploaded/<?php echo $row['slika']; ?>"
                alt="<?php echo $row['naslov']; ?>"
                class="article-image"
            >
            <p class="article-summary">
                <?php echo $row['sazetak']; ?>
            </p>
            <div class="article-content">
                <?php echo nl2br($row['tekst']); ?>
            </div>
        </section>
    </main>
    <footer>
        <h1>WELT</h1>
    </footer>
</body>
</html>
</body>
