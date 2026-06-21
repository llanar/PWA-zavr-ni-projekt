<?php

if(!isset($dbc) || !$dbc){
    $setupMessage = '
    <section class="setup-message">
    <h2>Initial setup required</h2>
    <p>
        Database "projekt" was not found.
    </p>
    <p>
        Please run setup.sql as described in <a href="readme.txt">README.md</a>.
    </p><br><br>
    <h2>README summary</h2>
            <p>
                Prije pokretanja aplikacije: <br><br>

                1. Start XAMPP (Apache and MySQL). <br>
                2. Run <a href="setup.sql">setup.sql</a> from <a target="_blank" href="http://localhost/phpmyadmin/index.php?route=/server/sql">http://localhost/phpmyadmin/index.php?route=/server/sql</a>.<br>
                3. Open <a href="http://localhost/PROJEKT/index.php">http://localhost/PROJEKT/index.php</a> <br><br>

                P. S. for testing: <br>
                    admin account: <br>
                        username: admin <br>
                        password: admin123 <br><br>

                Hvala!
            </p>
</section>
    ';
    return;
}


    $tableCheck = mysqli_query(
    $dbc,
    "SHOW TABLES LIKE 'vijesti'"
    );

if(mysqli_num_rows($tableCheck) == 0){
    $setupMessage = '
    <section class="setup-message">
    <h2>Initial setup required</h2>
    <p>
        Table <strong>vijesti</strong> was not found.
    </p>
    <p>
        Please import setup.sql as described in <a href="readme.txt">README.md</a>.
    </p>
    <br><br>
    <h2>README summary</h2>
            <p>
                Prije pokretanja aplikacije: <br><br>

                1. Start XAMPP (Apache and MySQL). <br>
                2. Run <a href="setup.sql">setup.sql</a> from <a href="http://localhost/phpmyadmin/index.php?route=/server/sql" target="_blank">http://localhost/phpmyadmin/index.php?route=/server/sql</a>.<br>
                3. Open <a href="http://localhost/PROJEKT/index.php">http://localhost/PROJEKT/index.php</a> <br><br>

                
                P. S. for testing: <br>
                    admin account: <br>
                        username: admin <br>
                        password: admin123 <br><br>

                Hvala!
            </p>
    </section>
    ';
    return;
}

    $countResult = mysqli_query(
    $dbc,
    "SELECT COUNT(*) AS total FROM vijesti"
    );

    $count = mysqli_fetch_assoc($countResult);

    if($count['total'] == 0){
        $setupMessage = '
    ?>
        <section class="setup-message">
        <h2>No articles found</h2>

        <p>
            The database exists, but no articles are available.
        </p>

        <p>
            Run setup.sql or add articles through the administration panel.
        </p>
        <br><br>
        <h2><a href="readme.txt">README.md</a> summary</h2>
            <p>
                Prije pokretanja aplikacije: <br><br>

                1. Start XAMPP (Apache and MySQL). <br>
                2. Run <a href="setup.sql">setup.sql</a> from <a href="http://localhost/phpmyadmin/index.php?route=/server/sql" target="_blank">http://localhost/phpmyadmin/index.php?route=/server/sql</a>.<br>
                3. Open <a href="http://localhost/PROJEKT/index.php">http://localhost/PROJEKT/index.php</a> <br><br>

                
                P. S. for testing: <br>
                    admin account: <br>
                        username: admin <br>
                        password: admin123 <br><br>

                Hvala!
            </p>
    </section>
    ';
    return;

    }
 ?>



