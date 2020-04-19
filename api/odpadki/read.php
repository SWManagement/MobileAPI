<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Odpadki.php';
    $database = new Database();
    $db = $database->connect();

    $odpadki = new Odpadki($db);

    $result = $odpadki->read();
    //get row count
    $num = $result->rowCount();
    // Check if any posts
    if ($num > 0){
        //Odpadki Array
        $odpadki_arr = array();
		$odpadki_arr["data"] = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$odpadki_item = array(
				"OID" => $oid,
				"ODPADEK" => $odpadek,
				"KODA"  => $koda,
				"KANTA" => $kanta,
				"KANTA BARVA" => $kanta_barva
			);

			array_push ( $odpadki_arr["data"], $odpadki_item);
		}

		echo json_encode($odpadki_arr);
    }else{
		echo json_encode("No odpadki found!");
	}
?>