<?php
$activePage = 'unos';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELT | Unos vijesti</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <article class="admin-form">
        <h2>Administracija vijesti</h2>
        <form action="skripta.php" method="POST" enctype="multipart/form-data"> 
            <div class="form-item"> 
                <label for="title">Naslov vijesti</label> 
                <div class="form-field"> 
                    <input type="text" name="title" class="form-field-textual"> 
                </div> 
            </div> 
            <div class="form-item"> 
                <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label> 
                <div class="form-field"> 
                    <textarea name="about" id="" cols="30" rows="10" class="form-field-textual"></textarea> 
                </div> 
            </div> 
            <div class="form-item"> 
                <label for="content">Sadržaj vijesti</label> 
                <div class="form-field"> 
                    <textarea name="content" id="" cols="30" rows="10" class="form-field-textual"></textarea> 
                </div> 
            </div> 
            <div class="form-item"> 
            <label for="pphoto">Slika: </label> 
            <div class="form-field"> 
                <input type="file" accept="image/jpg,image/gif" class="input-text" name="pphoto"/> 
            </div> </div> <div class="form-item"> 
                <label for="category">Kategorija vijesti</label>

        <div class="form-field"> 
            <select name="category" id="" class="form-field-textual"> 
                <option value="beruf">BERUF & KARRIERE</option> 
                <option value="food">FOOD</option> </select> 
            </div> </div> <div class="form-item"> 
                <label>Spremiti u arhivu: 
                    <div class="form-field"> 
                        <input type="checkbox" name="archive"> 
                    </div> 
                </label> 
            </div> 
            <div class="form-item"> 
                <button type="reset" value="Poništi">Poništi</button> 
                <button type="submit" value="Prihvati">Prihvati</button> 
            </div> 
        </form>
    </article>
    <footer>
        <h1>WELT</h1>
    </footer>
</body>
</html>