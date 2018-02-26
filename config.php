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

function selectRow($mysqli, $table, $what, $where, $field, $limit, $orderby, $orderType, $multiple){
  $insertWhere = "";
  $insertLimit = "";
  $insertOrder = "";

  if($where != "" && $field != ""){
    $insertWhere = "WHERE LOWER($where) = LOWER('$field')";
  }
  if($limit != ""){
    $insertLimit = "LIMIT $limit";
  }
  if($orderby != "" && $orderType != ""){
    $insertOrder = "ORDER BY ".$orderby." ".strtoupper($orderType);
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

function generatePlanetMenu($mysqliResult){
  ?>
  <div id="planetMenu">
    <?php
    while($row = $mysqliResult->fetch_array(MYSQLI_ASSOC)){
      ?>
      <div id="<?php echo $row["StyleID"];?>" class="planet" onclick="window.location = 'planet.php?id=<?php echo $row["ID"];?>'">
      <img title="<?php echo $row["Name"];?>" alt="<?php echo $row["Name"];?>" src="<?php echo $row["CartoonImage"];?>" />
      <div class="planetName"><?php echo $row["Name"];?></div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
}


function generatePlanetMenuFpage($mysqliResult){
  ?>
  <div id="responsivePlanetsContainer">
    <?php
    while($row = $mysqliResult->fetch_array(MYSQLI_ASSOC)){
      ?>
      <div id="<?php echo $row["StyleID"];?>Responsive" class="responsivePlanet" onclick="window.location = 'planet.php?id=<?php echo $row["ID"];?>'">
      <img title="<?php echo $row["Name"];?>" alt="<?php echo $row["Name"];?>" src="<?php echo $row["CartoonImage"];?>" />
      <div class="responsivePlanetName"><?php echo $row["Name"];?></div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
}

function generateFrontPage($mysqliResult){
  ?>
  <div id="mainSpaceContainer">
  <div id="spaceContainer">
  <?php
  $i = 0;
  while($row = $mysqliResult->fetch_array(MYSQLI_ASSOC)){
    if($row["PlanetsOrder"] == 1){
      $i++;
      ?>
      <div id="<?php echo $row["StyleID"];?>" planetOrder="<?php echo $row["PlanetsOrder"];?>" class="planet">
        <img title="<?php echo $row["Name"];?>" alt="<?php echo $row["Name"];?>" src="<?php echo $row["CartoonImage"];?>" />
        <div class="planetName"><?php echo $row["Name"];?></div>
      </div>
      <?php
    }else if($row["PlanetsOrder"] == 7){
      $i++;
      ?>
      <div id="orbit<?php echo $i-1; ?>" class="planetOrbit">
        <div class="pos">
          <div id="saturnShadow" planetOrder="<?php echo $i; ?>" class="planet"></div>
          <div id="<?php echo $row["StyleID"];?>" planetOrder="<?php echo $row["PlanetsOrder"];?>" class="planet">
            <img title="<?php echo $row["Name"];?>" alt="<?php echo $row["Name"];?>" src="<?php echo $row["CartoonImage"];?>" />
            <div class="planetName"><?php echo $row["Name"];?></div>
          </div>
        </div>
      </div>
      <?php
    }else{
      $i++;
      ?>
      <div id="orbit<?php echo $i-1; ?>" class="planetOrbit">
        <div class="pos">
          <div id="<?php echo $row["StyleID"];?>" planetOrder="<?php echo $row["PlanetsOrder"];?>" class="planet">
            <div class="planetShadow"></div>
            <img title="<?php echo $row["Name"];?>" alt="<?php echo $row["Name"];?>" src="<?php echo $row["CartoonImage"];?>" />
            <div class="planetName"><?php echo $row["Name"];?></div>
          </div>
        </div>
      </div>
      <?php
    }
  }
  ?>
  </div>
  </div>
  <?php
}
?>
