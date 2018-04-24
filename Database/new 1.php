function penData($un, $pw, $hostName, $database, $itemID){

    $connection = new mysqli($hostName, $un, $pw, $database);
    if ($connection->connect_error) {
        die($connection->connect_error);
    }

    $query = "SELECT * FROM Pens WHERE itemID = '". $itemID ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $pen = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $pen;
}



function woodData($un, $pw, $hostName, $database, $itemID){

    $connection = new mysqli($hostName, $un, $pw, $database);
    if ($connection->connect_error) {
        die($connection->connect_error);
    }

    $query = "SELECT * FROM WoodenPencil WHERE itemID = '". $itemID ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $wood = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $wood;
}



function mechData($un, $pw, $hostName, $database, $itemID){

    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }

    $query = "SELECT * FROM MechanicalPencil WHERE itemID = '" .$itemID ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $mech[$j] = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $mech;
}