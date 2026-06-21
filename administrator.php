

<?php
session_start();
include 'connect.php';
$loginError = '';
$uspjesnaPrijava = false;
$admin = false;

if(isset($_POST['prijava'])) {
    $username = $_POST['username'];
    $password = $_POST['lozinka'];
    $sql = "
        SELECT korisnicko_ime,
               lozinka,
               razina
        FROM korisnik
        WHERE korisnicko_ime = ?
    ";

    $stmt = mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $username
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result(
            $stmt,
            $dbUsername,
            $dbPassword,
            $dbLevel
        );
        mysqli_stmt_fetch($stmt);
        if(
            mysqli_stmt_num_rows($stmt) > 0 &&
            password_verify($password, $dbPassword)
        ) {
            $uspjesnaPrijava = true;
            $_SESSION['username'] = $dbUsername;
            $_SESSION['level'] = $dbLevel;
            $admin = ($dbLevel == 1);
        } else {
            $uspjesnaPrijava = false;
            $loginError =
                'Incorrect username or password. '
                . '<a href="registracija.php">Register here</a>';
                }
    }
} 

$admin = (
    isset($_SESSION['username']) &&
    $_SESSION['level'] == 1
);
?> 

<?php 

$activePage = 'admin';
//include 'connect.php';
define('UPLPATH', 'images-uploaded/');

if(isset($_POST['delete'])) {
    $id = (int)$_POST['id'];
    $query = "DELETE FROM vijesti WHERE id=$id";
    mysqli_query($dbc, $query);
}

if(isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $archive = isset($_POST['archive']) ? 1 : 0;
    $query = "SELECT slika FROM vijesti WHERE id=$id";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_assoc($result);

    $picture = $row['slika'];

    if(!empty($_FILES['pphoto']['name'])) {
        $picture = $_FILES['pphoto']['name'];
        move_uploaded_file(
            $_FILES['pphoto']['tmp_name'],
            UPLPATH . $picture
        );
    }

    $query = "
        UPDATE vijesti
        SET
            naslov='$title',
            sazetak='$about',
            tekst='$content',
            slika='$picture',
            kategorija='$category',
            arhiva='$archive'
        WHERE id=$id
    ";

    mysqli_query($dbc, $query);
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELT | Administracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php include 'header.php'; ?>
</header>
<main class="admin-form">

    <h2>Administracija članaka</h2>
    <?php
if(!isset($_SESSION['username'])) { ?>
<?php
if(!empty($loginError)){
    echo '
        <div class="error-box">
            '.$loginError.'
        </div>
    ';
}
?>

<div class="admin-form">
    <h2>Administrator Login</h2>
    <form method="POST">
        <div class="form-item">
            <label>Username</label>
            <input
                type="text"
                name="username"
                class="form-field-textual">
        </div>
        <div class="form-item">
            <label>Password</label>
            <input
                type="password"
                name="lozinka"
                class="form-field-textual">
        </div>
        <button
            type="submit"
            name="prijava">
            Login
        </button>
    </form>
</div> <?php } ?>


    <?php if($admin) { 
        $query = "SELECT * FROM vijesti ORDER BY datum DESC";
        $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="admin-card">
            <form
                enctype="multipart/form-data"
                action=""
                method="POST">
                <div class="form-item">
                    <label>Naslov vijesti</label>
                    <div class="form-field">
                        <input
                            type="text"
                            name="title"
                            class="form-field-textual"
                            value="<?php echo $row['naslov']; ?>">
                    </div>
                </div>

                <div class="form-item">
                    <label>Kratki sadržaj</label>
                    <div class="form-field">
                        <textarea
                            name="about"
                            rows="5"
                            class="form-field-textual"><?php echo $row['sazetak']; ?></textarea>
                    </div>
                </div>

                <div class="form-item">
                    <label>Sadržaj vijesti</label>
                    <div class="form-field">
                        <textarea
                            name="content"
                            rows="10"
                            class="form-field-textual"><?php echo $row['tekst']; ?></textarea>
                    </div>
                </div>

                <div class="form-item">
                    <label>Trenutna slika</label>
                    <div class="form-field">
                        <img
                            src="<?php echo UPLPATH . $row['slika']; ?>"
                            width="150"
                            alt="">
                        <br><br>
                        <input
                            type="file"
                            name="pphoto">
                    </div>
                </div>

                <div class="form-item">
                    <label>Kategorija</label>
                    <div class="form-field">
                        <select
                            name="category"
                            class="form-field-textual">
                            <option
                                value="beruf"
                                <?php if($row['kategorija']=='beruf') echo 'selected'; ?>>
                                Beruf & Karriere
                            </option>

                            <option
                                value="food"
                                <?php if($row['kategorija']=='food') echo 'selected'; ?>>
                                Food
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-item">
                    <label>
                        <input
                            type="checkbox"
                            name="archive"
                            <?php if($row['arhiva']) echo 'checked'; ?>>
                        Arhiviraj članak
                    </label>
                </div>

                <input
                    type="hidden"
                    name="id"
                    value="<?php echo $row['id']; ?>">

                <div class="form-item">
                    <button
                        type="submit"
                        name="update">
                        Izmjeni
                    </button>
                    <button
                        type="submit"
                        name="delete">
                        Izbriši
                    </button>
                </div>
            </form>
        </div>

        <?php } 
    }?>

    <?php

    if(
        isset($_SESSION['username']) &&
        $_SESSION['level'] == 0
    ) {

        echo '
            <div class="admin-form">
                <p>
                    '.$_SESSION['username'].',
                    nemate dovoljna prava za pristup ovoj stranici.
                </p>
            </div>
        ';
    }
    ?>

</main>

<footer>
    <h1>WELT</h1>
</footer>

</body>
</html>
