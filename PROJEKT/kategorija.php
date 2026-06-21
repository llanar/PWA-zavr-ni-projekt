<?php
session_start();
include 'connect.php';

$kategorija = mysqli_real_escape_string($dbc, $_GET['kategorija']);

$naslovKategorije = '';
if($kategorija == 'beruf') {
    $naslovKategorije = 'BERUF & KARRIERE';
    $activePage = 'beruf';
}
elseif($kategorija == 'food') {
    $naslovKategorije = 'FOOD';
    $activePage = 'food';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELT | <?php echo $naslovKategorije; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <header>
        <?php include 'header.php'; ?>
    </header>
<section>
    <h2><?php echo $naslovKategorije; ?></h2>
    <div class="articles">
        <?php
            $query = "SELECT * FROM vijesti
                    WHERE arhiva = 0
                    AND kategorija = '$kategorija'";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)) {
            ?>
                <article>
                    <img src="images-uploaded/<?php echo $row['slika']; ?>" alt="">
                    <h3>
                        <a href="clanak.php?id=<?php echo $row['id']; ?>">
                            <?php echo $row['naslov']; ?>
                        </a>
                    </h3>
                    <p><?php echo $row['sazetak']; ?></p>
                    <span class="date">
                        <?php echo date('d.m.Y.', strtotime($row['datum'])); ?>
                    </span>
                </article>
            <?php
            }
        ?>
    </div>
</section>
    <footer>
        <h1>WELT</h1>
    </footer>
</body>
</html>