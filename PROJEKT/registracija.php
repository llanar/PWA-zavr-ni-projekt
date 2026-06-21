<?php
session_start();
$activePage = 'registracija';
include 'connect.php';
include 'database_control.php';
?>

<?php

include 'connect.php';

$errors = [];
$success = false;

if(isset($_POST['submit'])){
    $ime = trim($_POST['ime']);
    $prezime = trim($_POST['prezime']);
    $username = trim($_POST['username']);
    $pass = $_POST['pass'];
    $passRep = $_POST['passRep'];
    if(empty($ime)){
        $errors[] = "Name is required.";
    }
    if(empty($prezime)){
        $errors[] = "Surname is required.";
    }
    if(empty($username)){
        $errors[] = "Username is required.";
    }
    if(empty($pass)){
        $errors[] = "Password is required.";
    }
    if($pass !== $passRep){
        $errors[] = "Passwords do not match.";
    }
    if(empty($errors)){
        $sql = "SELECT korisnicko_ime
                FROM korisnik
                WHERE korisnicko_ime = ?";

        $stmt = mysqli_prepare($dbc, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $username
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) > 0){
            $errors[] = "Username already exists.";
        }
    }
    if(empty($errors)){
        $hashed_password =
            password_hash(
                $pass,
                PASSWORD_DEFAULT
            );
        $razina = 0;
        $sql = "INSERT INTO korisnik
                (ime, prezime,
                 korisnicko_ime,
                 lozinka,
                 razina)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "ssssi",
            $ime,
            $prezime,
            $username,
            $hashed_password,
            $razina
        );
        mysqli_stmt_execute($stmt);
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELT | Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>
    
    <?php if($success){ ?>
        <section class="admin-form">
            <h2>Registration successful</h2>
            <p>
                Your account has been created.
            </p>
            <p>
                <a href="administrator.php">
                    Login here
                </a>
            </p>
        </section>
    <?php } else { 
        if(!empty($errors)){
            echo '<div class="error-box">';
            foreach($errors as $error){
                echo '<p>'.$error.'</p>';
            }
            echo '</div>';
        }

?>

    <form method="POST" action=""> <br><br>
    <h2>Registracija</h2> <br><br>
    <div class="form-item">
        <label>First Name</label>

        <input
            type="text"
            name="ime"
            class="form-field-textual"
            value="<?php echo $_POST['ime'] ?? ''; ?>"
        >
    </div>

    <div class="form-item">
        <label>Last Name</label>

        <input
            type="text"
            name="prezime"
            class="form-field-textual"
            value="<?php echo $_POST['prezime'] ?? ''; ?>"
        >
    </div>

    <div class="form-item">
        <label>Username</label>

        <input
            type="text"
            name="username"
            class="form-field-textual"
            value="<?php echo $_POST['username'] ?? ''; ?>"
        >
    </div>

    <div class="form-item">
        <label>Password</label>

        <input
            type="password"
            name="pass"
            class="form-field-textual"
        >
    </div>

    <div class="form-item">
        <label>Repeat Password</label>

        <input
            type="password"
            name="passRep"
            class="form-field-textual"
        >
    </div>

    <div class="form-item">
        <button
            type="submit"
            name="submit"
        >
            Register
        </button>
    </div>

</form>

    <?php } ?>
</main>

    <footer>
        <h1>WELT</h1>
    </footer>
</body>
</html>