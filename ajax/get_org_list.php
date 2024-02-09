<?php
include "connection.php";
$oblast = $_GET['oblast'];

$query = "SELECT * FROM a1_all_organisation";
if ($oblast != 0) {
    $query .= " WHERE oblast='$oblast'";
}
$rez = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
$response = array();
while ($row = mysqli_fetch_assoc($rez)) {
    $org = array();
    $org['id_a1_all_organisation'] = $row['id_a1_all_organisation'];
    $org['name'] = $row['name'];
    $org['oblast'] = $row['oblast'];
    $response[] = $org;
}

echo json_encode($response);
?>