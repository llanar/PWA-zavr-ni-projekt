<?php

include 'connect.php';

$picture = $_FILES['pphoto']['name'];

$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];

if(isset($_POST['archive'])){
    $archive = 1;
}
else{
    $archive = 0;
}

$target_dir = 'images-uploaded/' . $picture;

move_uploaded_file(
    $_FILES['pphoto']['tmp_name'],
    $target_dir
);

$sql = "
    INSERT INTO vijesti
    (
        naslov,
        sazetak,
        tekst,
        slika,
        kategorija,
        arhiva
    )
    VALUES
    (?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_stmt_init($dbc);

if(mysqli_stmt_prepare($stmt, $sql)) {

    mysqli_stmt_bind_param(
        $stmt,
        "sssssi",
        $title,
        $about,
        $content,
        $picture,
        $category,
        $archive
    );

    mysqli_stmt_execute($stmt);
}

mysqli_close($dbc);

?>

