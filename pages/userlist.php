<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>List of users</title>
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
  <h2>Felhasználók</h2>

<?php
include("../models/User.php");

// csatlakozás a MySQL szerverhez
$conn = mysqli_connect("localhost", "default", "RabIT_Probafeladat") or die("Hiba történt!");

if (mysqli_select_db($conn, "probafeladat")) {
    $sql = "SELECT id, name FROM user";
    $res = mysqli_query($conn, $sql) or die("Nem sikerült végrehajtani az SQL utassítást!");

    echo "<table id='table-users'>";
    echo "<tr><th>ID</th><th>Név</th></tr>";

    // kulcs-érték párokként (asszociatív tömb) kezeljük a táblát
    while (($current_row = mysqli_fetch_assoc($res)) != null) {
        $user = new User($current_row["id"], $current_row["name"]);
        echo '<tr><td>' . $user->getId() . '</td><td>' . $user->getName() . '</td></tr>';
    }
    echo "</table>";

    // lefoglalt memória felszabadítása
    mysqli_free_result($res);
} else {
  die("Nem sikerült kapcsolódni az adatbázishoz!");
}
?>

</body>
</html>