<?php
//Create a connection to the database
//Requires a host (ip), username, password and the database name
function dbConnect($host, $user, $pass, $database){
  $mysqli=mysqli_connect($host, $user, $pass, $database); //Connect the database using the values the user defined
  $mysqli->set_charset('utf8'); //Set the charset to UTF-8 so we won't hve any issues with special characters

  if ($mysqli->connect_errno) { //If the connection encounters an error
      printf("Connect failed: %s\n", $mysqli->connect_error); //Write the error
      exit(); //Exit the function
  }

  return $mysqli; //Return the connection
}

//Close the connection to the database
//Requires an connection
function dbDisconnect($mysqli){
  mysqli_close($mysqli); //Close the connection defined by the user
}

//Select one or multiple rows from the database
//Requires: Connection to the database, database table, what we want to select,
//from where we want it, WHERE condition and with a field reference, LIMIT condition,
//ORDERBY condition with field and type (ASC or DESC) and if it you want one or multiple reqults
function selectRow($mysqli, $table, $what, $where, $field, $limit, $orderby, $orderType, $multiple){
  //Defines global function variables
  $insertWhere = "";
  $insertLimit = "";
  $insertOrder = "";

  if($where != "" && $field != ""){ //If $where and $field isn't empty
    $insertWhere = "WHERE LOWER($where) = LOWER('$field')"; //Updates the $insertWhere variable to contain the WHERE condition
  }
  if($limit != ""){ //If $limit isn't empty
  }
  $insertLimit = "LIMIT $limit"; //Updates the $insertLimit variable to contain the LIMIT condition
  if($orderby != "" && $orderType != ""){ //If $orderby and $orderType isn't empty
    $insertOrder = "ORDER BY ".$orderby." ".strtoupper($orderType); //Updates the $insertOrder variable to contain the ORDER BY condition
  }

  $query = "SELECT $what FROM $table $insertWhere $insertOrder $insertLimit"; //Construct the sql query
  $result = $mysqli->query($query); //Convert it to an sql element

  if ($multiple == true) { //If the variable $multiple is true
    return $result; //Return the $result
  }else{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row; //Return row
  }
}

//Generate the planet menu used on planet.php
//Requires an mysqli result
function generatePlanetMenu($mysqliResult){
  ?>
  <div id="planetMenu">
    <?php
    while($row = $mysqliResult->fetch_array(MYSQLI_ASSOC)){ //While there is a row available to fetch, take and put into the variable $row
      ?>
      <div id="<?php echo $row["StyleID"]; //Get the id from the database ?>" class="planet" onclick="window.location = 'planet.php?id=<?php echo $row["ID"]; //Get the planet ID from the database ?>'">
      <img title="<?php echo $row["Name"]; //Get the name from the database ?>" alt="<?php echo $row["Name"]; //Get the name from the database ?>" src="<?php echo $row["CartoonImage"]; //Get the cartoon image url from the database ?>" />
      <div class="planetName"><?php echo $row["Name"]; //Get the name from the database ?></div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
}

//Generate the planet menu used on index.php
//Requires an mysqli result
function generatePlanetMenuFpage($mysqliResult){
  ?>
  <div id="responsivePlanetsContainer">
    <?php
    while($row = $mysqliResult->fetch_array(MYSQLI_ASSOC)){ //While there is a row available to fetch, take and put into the variable $row
      ?>
      <div id="<?php echo $row["StyleID"]; //Get the StyleID from the database ?>Responsive" class="responsivePlanet" onclick="window.location = 'planet.php?id=<?php echo $row["ID"]; //Get the id from the database ?>'">
      <img title="<?php echo $row["Name"]; //Get the name from the database ?>" alt="<?php echo $row["Name"]; //Get the name from the database ?>" src="<?php echo $row["CartoonImage"]; //Get the cartoon image url from the database ?>" />
      <div class="responsivePlanetName"><?php echo $row["Name"]; //Get the name from the database ?></div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
}

//Generate the solar system on the index.php
//Requires an mysqli result
function generateFrontPage($mysqliResult){
  ?>
  <div id="mainSpaceContainer">
  <div id="spaceContainer">
  <?php
  $i = 0;
  while($row = $mysqliResult->fetch_array(MYSQLI_ASSOC)){ //While there is a row available to fetch, take and put into the variable $row
    if($row["PlanetsOrder"] == 1){ //Seperate the sun because it dosen't have the same html markup as the rest
      $i++;
      ?>
      <div id="<?php echo $row["StyleID"]; //Get the styleID from the database ?>" planetOrder="<?php echo $row["PlanetsOrder"]; //Get the planet order in the solar system from the database ?>" class="planet">
        <img title="<?php echo $row["Name"]; //Get the name from the database ?>" alt="<?php echo $row["Name"]; //Get the name from the database ?>" src="<?php echo $row["CartoonImage"]; //Get the cartoon image url from the database ?>" />
        <div class="planetName"><?php echo $row["Name"]; //Get the name from the database ?></div>
      </div>
      <?php
    }else if($row["PlanetsOrder"] == 7){ //Seperate the saturn because it dosen't have the same html markup as the rest
      $i++;
      ?>
      <div id="orbit<?php echo $i-1; //Sets the planet orbit order ?>" class="planetOrbit">
        <div class="pos">
          <div id="saturnShadow" planetOrder="<?php echo $i; //Sets the planet order ?>" class="planet"></div>
          <div id="<?php echo $row["StyleID"]; //Get the styleID from the database ?>" planetOrder="<?php echo $row["PlanetsOrder"]; //Sets the planet order ?>" class="planet">
            <img title="<?php echo $row["Name"]; //Get the name from the database ?>" alt="<?php echo $row["Name"];  //Get the name from the database ?>" src="<?php echo $row["CartoonImage"]; //Get the cartoon image url from the database ?>" />
            <div class="planetName"><?php echo $row["Name"]; //Get the name from the database ?></div>
          </div>
        </div>
      </div>
      <?php
    }else{ //If any other planet than the two previously defined
      $i++;
      ?>
      <div id="orbit<?php echo $i-1; //Sets the planet orbit order ?>" class="planetOrbit">
        <div class="pos">
          <div id="<?php echo $row["StyleID"]; //Get the styleID from the database ?>" planetOrder="<?php echo $row["PlanetsOrder"]; //Sets the planet order ?>" class="planet">
            <div class="planetShadow"></div>
            <img title="<?php echo $row["Name"]; //Get the name from the database ?>" alt="<?php echo $row["Name"]; //Get the name from the database ?>" src="<?php echo $row["CartoonImage"]; //Get the cartoon image url from the database ?>" />
            <div class="planetName"><?php echo $row["Name"]; //Get the name from the database ?></div>
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
