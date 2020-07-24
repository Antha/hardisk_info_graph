<?php
require_once 'Config.php';
$query = "SELECT * FROM size_info";
$doquery = mysqli_query($connect,$query);
while ($row = mysqli_fetch_array($doquery)) {
  $data["DATETIME"][] = $row["DATETIME"];
  $data["SIZE"][] = $row["SIZE"] * 1;
  $data["SIZE2"][] = $row["SIZE2"] * 1;
}

echo json_encode($data);
?>