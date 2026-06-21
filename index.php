<?php
session_start();
$activePage = 'home';
include 'connect.php';
include 'database_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELT | Aktuelle Nachrichten</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <?php

if(!empty($setupMessage)) {

    echo $setupMessage;

} else {?>

    

    <article>
        <section>
            <h2>BERUF & KARRIERE</h2>
            <div class="articles">
                <?php
                    $query = "SELECT * FROM vijesti
                            WHERE arhiva = 0
                            AND kategorija = 'beruf'
                            ORDER BY datum DESC
                            LIMIT 3";
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
                                <?php echo $row['datum']; ?>
                            </span>
                        </article>
                    <?php } ?>
            </div>
        </section>
        <section>
            <h2>FOOD</h2>
            <div class="articles">
                <?php
                    $query = "SELECT * FROM vijesti
                            WHERE arhiva = 0
                            AND kategorija = 'food'
                            ORDER BY datum DESC
                            LIMIT 3";
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
                                <?php echo $row['datum']; ?>
                            </span>
                        </article>
                    <?php } ?>
            </div>
        </section>
    </article>
    <?php
}
?>
    <footer>
        <h1>WELT</h1>
    </footer>
</body>
</html>