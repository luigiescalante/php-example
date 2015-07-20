<?php
function getTableResponse(array $aResponse, $displayStart, $rowsPerPage) {
    $aRecord = array_slice($aResponse, $displayStart, $rowsPerPage);
    $output = array(
        "sEcho" => intval(0),
        "iTotalRecords" => $rowsPerPage,
        "iTotalDisplayRecords" => count($aResponse),
        "data" => $aRecord
    );
    header('Content-Type: application/json');
    echo json_encode($output);
}


$delimiter = ";";
$aCountry = array();
$countryName = strtolower($_POST["name"]);
$flCountry = fopen("country.csv", "r");
$i = 0;
while (($aData = fgetcsv($flCountry, 1000, ",")) !== FALSE) {
    $aRow = explode($delimiter, $aData[0]);
    if (strpos(strtolower($aRow[1]), $countryName) !== FALSE) {
        $aCountry[$i] = array(
            "country_id" => $aRow[0],
            "name" => $aRow[1]
        );
    }
    $i++;
}
fclose($flCountry);
getTableResponse($aCountry, $_POST["iDisplayStart"], $_POST["iDisplayLength"]);