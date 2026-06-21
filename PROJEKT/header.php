<?php
include 'connect.php';

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

?>

<h1>WELT</h1>
<nav>
    <ul>
        <li>
            <a href="index.php" class="<?php if($activePage == 'home') echo 'active-page'; ?>"> HOME </a>
        </li>
        <li>
            <a href="kategorija.php?kategorija=beruf" class="<?php if($activePage == 'beruf') echo 'active-page'; ?>"> BERUF & KARRIERE </a>
        </li>
        <li>
            <a href="kategorija.php?kategorija=food" class="<?php if($activePage == 'food') echo 'active-page'; ?>"> FOOD </a>
        </li>
        <?php if(isset($_SESSION['username'])) { ?>
    <li>
        <a href="unos.php"
           class="<?php if($activePage=='unos') echo 'active-page'; ?>">
            UNOS
        </a>
    </li>
<?php } ?>

        <?php if(isset($_SESSION['username'])) { ?>
            <li>
                <a href="administrator.php"
                   class="<?php if($activePage=='admin') echo 'active-page'; ?>">
                    ADMIN
                </a>
            </li>
            <li>
                <a href="logout.php">
                    LOGOUT
                    (<?php echo $_SESSION['username']; ?>)
                </a>
            </li>
        <?php } else { ?>
            <li>
                <a href="administrator.php">
                    LOGIN
                </a>
            </li>
            <li>
                <a href="registracija.php">
                    REGISTER
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>