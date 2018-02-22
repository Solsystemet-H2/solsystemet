<?php
function dbConnect($host, $user, $pass, $database){
  $mysqli=mysqli_connect($host, $user, $pass, $database);
  $mysqli->set_charset('utf8');

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  return $mysqli;
}

function dbDisconnect($mysqli){
  mysqli_close($mysqli);
}

function selectRow($mysqli, $table, $what, $where, $field, $limit, $order, $multiple){
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

  if ($multiple == true) {
    return $result;
  }else{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row;
  }
}
?>
