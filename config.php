<?php
//"localhost","root","","solsystemdb"
function DbConnect($host, $user, $pass, $database){
  $mysqli=mysqli_connect($host, $user, $pass, $database);
  $mysqli->set_charset('utf8');

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  return $mysqli;
}

function DbDisconnect($mysqli){
  mysqli_close($mysqli);
}

function SelectRow($mysqli, $table, $what, $where, $field, $limit, $order){
  $insertWhere = "";
  $insertLimit = "";
  $insertOrder = "";

  if($where != "" && $field != ""){
    $insertWhere = "WHERE LOWER($where) = LOWER('$field')";
  }
  if($limit != ""){
    $insertLimit = "LIMIT $limit";
  }
  if($order != ""){
    $insertOrder = "ORDER BY ".strtoupper($order);
  }

  $query = "SELECT $what FROM $table $insertWhere $insertOrder $insertLimit";
  $result = $mysqli->query($query);

  $row = $result->fetch_array(MYSQLI_ASSOC);

  return $row;
}

function SelectMultipleRows($mysqli, $table, $what, $where, $field, $limit, $order){
  $insertWhere = "";
  $insertLimit = "";
  $insertOrder = "";

  if($where != "" && $field != ""){
    $insertWhere = "WHERE LOWER($where) = LOWER('$field')";
  }
  if($limit != ""){
    $insertLimit = "LIMIT $limit";
  }
  if($order != ""){
    $insertOrder = "ORDER BY ".strtoupper($order);
  }

  $query = "SELECT $what FROM $table $insertWhere $insertOrder $insertLimit";
  $result = $mysqli->query($query);

  //$row = $result->fetch_array(MYSQLI_ASSOC);

  return $result;
}

/*$connect = DbConnect("localhost","root","","solsystemdb");
$row = SelectRow($connect, "planet", "Name", "Solen", "", "");

echo $row["Descreption"];
DbDisconnect($connect);*/
?>
