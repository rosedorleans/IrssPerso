<?php 


$connect = new PDO("mysql=host:localhost;dbname:persoirss", "root", "");

$data = array();

$query = "SELECT * FROM event ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row) {
    $data[] = array(
        'id' => $row["id"],
        'start' => $row["start"],
        'end' => $row["end"],
        'title' => $row["title"],
        'description' => $row["description"],
        'color' => $row["color"],
        'allDay' => $row["allDay"]
    );
}

echo json_encode($data);

?>