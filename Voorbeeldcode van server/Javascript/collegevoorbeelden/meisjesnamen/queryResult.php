<?php
  include("opendb.php");

  $stmt = $db->prepare("SELECT naam FROM meisjesnamen WHERE naam LIKE ? LIMIT 20");
  $stmt->bindValue(1, $_GET['q'] . "%", PDO::PARAM_STR);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_NUM);

  foreach ($results as $row) {
    echo $row[0] . "<br />";
  }
?>
