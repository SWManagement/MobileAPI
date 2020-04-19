<?php
    class Odpadki{
        // get relations
    private $conn;
    private $table = "Odpadki";
        // define 
    private $OID;
    private $ODPADEK;
    private $KODA;
    private $KANTA;
    private $BARVA;
     
    public function read() {
        // create query
        $query = 'SELECT
               k.BARVA as KANTA_BARVA,
               o.OID,
               o.ODPADEK,
               o.KODA,
               o.KANTA
               FROM
               '. $this->table .'
               LEFT JOIN
               KANTA k ON o.KANTA = k.KID
               ORDER BY
               o.OID';
        // prepare query
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt-> execute();
        return $stmt;
    }
    }

?>