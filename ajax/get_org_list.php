<?php
include "connection.php";
$oblast = $_GET['oblast'];
$search = $_GET['search'];

$query = "SELECT * FROM a1_all_organisation";
if ($oblast != 0) {
    $query .= " WHERE oblast='$oblast'";
}
if (!empty($search)) {
    $query .= " AND name LIKE '%$search%'"; //по названию
}

$rez = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
$response = array();
while ($row = mysqli_fetch_assoc($rez)) {
    $org = array();
    $org['id_a1_all_organisation'] = $row['id_a1_all_organisation'];
    $org['name'] = $row['name'];
    switch ($row['oblast']) {
        case 1:
            $org['oblast'] = "Гомельская область";
            break;
        case 2:
            $org['oblast'] = "Минская область";
            break;
        case 3:
            $org['oblast'] = "Брестская область";
            break;
        case 4:
            $org['oblast'] = "Витебская область";
            break;
        case 5:
            $org['oblast'] = "Гродненская область";
            break;
        default:
            $org['oblast'] = "";
            break;
    }
    $response[] = $org;
}

echo json_encode($response);
?>