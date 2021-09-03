<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>List of advertisements</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
  <div id="header">
    <h1>Próbafeladat megoldás</h1>
    <h4>Szabados Donát</h4>
  </div>
  <hr>
  <div id="menu">
    <a href="../index.php">Főoldal</a>
    <a href="userlist.php">Felhasználók</a>
    <a href="adlist.php">Hirdetések</a>
  </div>
  <hr>
  <br>
  <h2>Hirdetések</h2>

<?php
include("../models/Advertisement.php");
include("../models/User.php");

// csatlakozás a MySQL szerverhez
$conn = mysqli_connect("localhost", "default", "RabIT_Probafeladat") or die("Hiba történt!");

if (mysqli_select_db($conn, "probafeladat")) {
    $sql_ad = "SELECT id, userid, title FROM advertisement";
    $res_ad = mysqli_query($conn, $sql_ad) or die("Nem sikerült végrehajtani az SQL utasítást!");

    echo "<table id='table-ads'>";
    echo "<tr><th>ID</th><th>Név</th><th>Cím</th></tr>";

    // kulcs-érték párokként (asszociatív tömb) kezeljük a táblát
    while (($current_row = mysqli_fetch_assoc($res_ad)) != null) {
        $ad = new Advertisement($current_row["id"], $current_row["userid"], $current_row["title"]);

        // a hirdetés "userid" adattagjának megfelelő felhasználó nevének kiválasztása
        $sql_user = "SELECT name FROM user WHERE id=" . $ad->getUserid();
        $res_user = mysqli_query($conn, $sql_user) or die("Nem sikerült végrehajtani az SQL utasítást!");
        $fetched_user = mysqli_fetch_assoc($res_user);

        $user = new User($ad->getUserid(), $fetched_user["name"]);
        echo '<tr><td>' . $ad->getId() . '</td><td>' . $user->getName() . '</td><td>' . $ad->getTitle() . '</td></tr>';
    }
    echo "</table>";

    // lefoglalt memória felszabadítása
    mysqli_free_result($res_ad);
} else {
    die("Nem sikerült kapcsolódni az adatbázishoz!");
}
?>

</body>
</html>