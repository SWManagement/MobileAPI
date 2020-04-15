<?php

$response = array();

require_once __DIR__ . "/MobileDB_connect.php";

$db = new DB_CONNECT();

if (isset($_GET["ODPADEK"])){
    $ODPADEK = $_GET[ODPADEK];
    $result = mysql_query("SELECT * FROM Odpadki WHERE ODPADEK = $ODPADEK");

    if (!empty($result)){
        if (mysql_num_rows($result) > 0){
            $result = mysql_fetch_array($result);

            $ODPADKI = array();
            $ODPADKI["OID"] = $result["OID"];
            $ODPADKI["ODPADEK"] = $result["ODPADEK"];
            $ODPADKI["KODA"] = $result["KODA"];
            $ODPADKI["KANTA"] = $result["KANTA"];

            // success

            $response["success"] = 1;

            $response["ODPADKI"] = array();
            array_push($response["ODPADKI"], $ODPADKI);

            echo json_encode($response);
        } else{
            // no product found
            $response["success"] = 0;
            $response["message"] = "No product found";
            echo json_encode ($response);
        }
    } else{
        $response["success"] = 0;
        $response["message"] = "Required field is missing";
        echo json_encode($response);
    }
}
?>