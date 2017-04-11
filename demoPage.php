<!DOCTYPE html>
<!--
Manmeet Dhaliwal
471 Sample project to show connection to local database
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hello</title>
    </head>
    <body>
        <h1>Demo for 471</h1>
        <?php
            //Trainers
            //**********************************************************************
            //Format: ID, Name, Age, Town, PokemonID
            $trainerArr =array( 
                    array(0, "No Trainer", 0, "No Location"),
                    array(1, "Red", 11, "Pallet Town" ),
                    array(2, "Ethan", 11, "New Bark Town"),
                    array(3, "Brendan", 12, "Littleroot Town"),
                    array(4, "Lucas", 13, "Twinleaf Town"),
                    array(5, "Hilbert", 14, "Nuvema Town"),
                    array(6, "Nate", 13, "Aspertia City"),
                    array(7, "Calem", 16, "Vaniville Town"),
                    array(8, "Sun", 16, "Route 1")
                );
            //**********************************************************************
            
            //Pokemons
            //**********************************************************************
            //Format: ID, Name, HP, Atk, Def, Sp.Atk, Sp.Def, Speed, Type1, Type2
            $pArr = array(
                array(1, "Bulbasaur", 45, 49, 49, 65, 65, 45, "Grass", "Poison", 1),
                array(2, "Ivysaur", 60, 62, 63, 80, 80, 60, "Grass", "Poison", 0),
                array(3, "Venusaur", 80, 82, 83, 100, 100, 80, "Grass", "Poison", 0),
                array(4, "Charmander", 39, 52, 43, 60, 50, 65, "Fire", "N/A", 1),
                array(5, "Charmeleon", 58, 64, 58, 80, 65, 80, "Fire", "N/A", 0),
                array(6, "Charizard", 78, 84, 78, 109, 85, 100, "Fire", "Flying", 0),
                array(7, "Squirtle", 44, 48, 65, 50, 64, 43, "Water", "N/A", 1),
                array(8, "Wartortle", 59, 63, 80, 65, 80, 58, "Water", "N/A", 0),
                array(9, "Blastoise", 79, 83, 100, 85, 105, 78, "Water", "N/A", 0),
                array(10,"Caterpie", 45, 30, 35, 20, 20, 45, "Bug", "N/A", 0)
                );
            //**********************************************************************
            
            //NPCS
            //**********************************************************************
            //Format: ID, title, name, location, numb of pokemon, map
            $npcArr = array(
                array(0, NULL, NULL, NULL, 0, "Unknown"),
                array(1, "Professor", "Oak", "Pallet Town Research Lab", 0, "Pallet Town"),
                array(2, "Youngster", "Joey", "Route 30", 1, "Route 30"),
                array(3, "Gym Leader", "Brock", "Pewter Gym", 2, "Pewter City"),
                array(4, "Champion", "Cynthia", "Pokemon League", 6, "Pokemon League"),
                array(5, "PokeMart", "Clerk", "Viridian City PokeMart", 0, "Viridian City"),
                array(6, "Bicycle Shop", "Clerk", "Cerulean City Bicycle Shop", 0, "Cerulean City"),
                array(7, "Ship Captain", "Bob", "S.S. Anne", 0, "Vermilion City"),
                array(8, "Gym Leader", "Misty", "Cerulean Gym", 2, "Cerulean City"),
                array(9, "Silph Co", "President", "Silph Co Building", 0, "Saffron City")
            );
            //**********************************************************************
            
            //Maps
            //**********************************************************************
            //Format: name, north, south, west, east
            $mapArr = array(
                array("Pallet Town"),
                array("Route 1"),
                array("Pewter City"),
                array("Cerulean City"),
                array("S.S. Anne"),
                array("Saffron City"),
                array("Silph Co"),
                array("Route 30"),
                array("Viridian City"),
                array("Pokemon League"),
                array("Vermilion City"),
                array("Route 16"),
                array("Route 2"),
                array("Unknown")
            );
            //**********************************************************************
            
            //Items
            //**********************************************************************
            //Format: ID, Name, Effect, Category, NPCID
            $itemArr = array(
                array(1, "Poke Ball", "Allows the player to catch wild Pokemon", "Item", 5),
                array(2, "Potion", "Heals a Pokemon by 20 HP", "Medicine", 5),
                array(3, "Bicycle", "Allows for faster travel than walking or running. Can be used to ride on Cycling Roads", "Key Item", 6),
                array(4, "Master Ball", "A ball that captures any wild Pokemon without fail.", "Item", 9)
            );
            //**********************************************************************
            
            //HMTM
            //**********************************************************************
            //Format: ID, BadgeReq, PP, Effect, Damage, Type, NPCID, MapName
            $machineArr = array(
                array("HM01", "None", 30, "Allow User to cut trees outside of battle", 50, "Normal", 7, "S.S. Anne"),
                array("HM02", "None", 15, "Allow User to fly to any previously visited city outside of battle", 90, "Flying", 0, "Route 16"),
                array("HM03", "None", 15, "Allow user to traverse water terrains", 90, "Water", 0, "Unknown"),
                array("TM22", "None", 10, NULL, 120, "Grass", 0, "Unknown"),
                array("TM25", "None", 10, NULL, 110, "Thunder", 0, "Unknown")
            );
            //**********************************************************************
            
            //CanLearn
            //**********************************************************************
            //Format: pID, HMID
            $learnArr = array(
                array(1, "HM01"),
                array(2, "HM01"),
                array(3, "HM01"),
                array(7,"HM03"),
                array(8, "HM03"),
                array(9, "HM03")
            );
            //**********************************************************************
            
            //gym
            //**********************************************************************
            //Format: Name, Location, NPCID
            $gymArr = array(
                array("Pewter Gym", "Pewter City", 3),
                array("Cerulean Gym", "Cerulean City", 8)
            );
            //**********************************************************************
            
            //imap
            //**********************************************************************
            //Format: ItemID, MapName
            $itemmapArr = array(
                array(1, "Route 2"),
                array(2, "Route 2"),
                array(3, "Unknown"),
                array(4, "Silph Co")
            );
            //**********************************************************************
            
            //pmap
            //**********************************************************************
            //Format: pID, Location
            $pmapArr = array(
                array(1, "Pallet Town"),
                array(10, "Route 2")
            );
            //**********************************************************************
			
            // Moves
            //**********************************************************************
            //Format: pMoveID, Level, Move
            $moveArr = array (
                array(1, 1, "Tackle"),
                array(1, 3, "Growl"),
                array(2, 1, "Tackle"),
                array(2, 3, "Growl"),
                array(3, 1, "Tackle"),
                array(3, 3, "Growl"),
                array(4, 1, "Scratch"),
                array(4, 3, "Growl"),
                array(5, 1, "Scratch"),
                array(5, 3, "Growl"),
                array(6, 1, "Scratch"),
                array(6, 3, "Growl"),
                array(7, 1, "Tackle"),
                array(7, 3, "Tail Whip"),
                array(8, 1, "Tackle"),
                array(8, 3, "Tail Whip"),
                array(9, 1, "Tackle"),
                array(9, 3, "Tail Whip"),
                array(10, 1, "Tackle"),
                array(10, 3, "String Shot")
            );
            //**********************************************************************
			
            //Server Info
            //**********************************************************************
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "abcd1234";             //your localhost root password
            $db = "tempdb";                     //your database name
            //**********************************************************************
            $conn = new mysqli($servername, $username, $password, $db);
            
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }else{
                echo "Connected<br>";
            }
            
            //***************************************************************************************************************************
            //TRAINER QUERIES
            //***************************************************************************************************************************
            //sql query enter all trainer's info
            for($i = 0; $i < sizeof($trainerArr); $i++){
                $fieldval1 = $trainerArr[$i][0]; //ID
                $fieldval2 = $trainerArr[$i][1]; //Name
                $fieldval3 = $trainerArr[$i][2]; //Age
                $fieldval4 = $trainerArr[$i][3]; //Town
                $sql = "INSERT INTO trainer (TrainerID, Name, Age, StartingTown) VALUES (". $fieldval1 .", '". $fieldval2 ."', ". $fieldval3 .", '". $fieldval4 ."')";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed trainers<br>";
                }
                else{
                    echo "Query did not execute trainers<br>";
                }
            }
            
            //sql query prints all trainer info
            $sql = "SELECT Name, Age, StartingTown FROM trainer";
            echo "<br><br>Printing Trainers: <br>";
            $result = $conn->query($sql);       //execute the query
            
            if($result->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
                    echo "Name: ".$row["Name"].", "; //here we are looking at one row, and printing the value in "names" column
                    echo "Age: ".$row["Age"].", ";
                    echo "Starting Town: ".$row["StartingTown"]."<br>";
                }
            }
            
            /*
             * Deletes everything in trainer
            echo "Deleteing all stuff<br>";
            $sql = "DELETE FROM trainer";
            if($conn->query($sql)==TRUE){       //try executing the query 
                echo "Query executed<br>";
            }
            else{
                echo "Query did not execute<br>";
            }*/
            
            
            //***************************************************************************************************************************
            
            //POKEMON QUERIES
            //***************************************************************************************************************************
            for($i = 0; $i < sizeof($pArr); $i++){
                $fieldval1 = $pArr[$i][0]; //ID
                $fieldval2 = $pArr[$i][1]; //Name
                $fieldval3 = $pArr[$i][2]; //Hp
                $fieldval4 = $pArr[$i][3]; //Atk
                $fieldval5 = $pArr[$i][4]; //Def
                $fieldval6 = $pArr[$i][5]; //Sp.Atk
                $fieldval7 = $pArr[$i][6]; //Sp.Def
                $fieldval8 = $pArr[$i][7]; //Speed
                $fieldval9 = $pArr[$i][8]; //Type1
                $fieldval10 = $pArr[$i][9]; //Type2
                $fieldval11 = $pArr[$i][10]; //trainer
                
                //Pokemon table
                $sql = "INSERT INTO pokemon (PokemonID, Name, TrainerID) VALUES (".$fieldval1.", '".$fieldval2."', ".$fieldval11.")";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed pokemon<br>";
                }
                else{
                    echo "Query did not execute pokemon<br>";
                    echo("Error description:" . mysqli_errno($conn));
                }
                
                //Stats table
                $sql = "INSERT INTO stats (pID, HP, Attack, Defence, SpAtk, SpDef, Speed) VALUES (".$fieldval1.", ".$fieldval3.", ".$fieldval4.", ".$fieldval5.", ".$fieldval6.", ".$fieldval7.", ".$fieldval8.")";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed stats<br>";
                }
                else{
                    echo "Query did not execute stats<br>";
                    echo("Error description:" . mysqli_errno($conn));
                }
                
                //Ptypes table
                $sql = "INSERT INTO ptypes (pID, FirstType, SecondType) VALUES (".$fieldval1.", '".$fieldval9."', '".$fieldval10."')";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed ptype<br>";
                }
                else{
                    echo "Query did not execute ptype<br>";
                    echo("Error description:" . mysqli_errno($conn));
                    
                }
                
            }
            //***************************************************************************************************************************
          // 
             //MAPS QUERIES
             //***************************************************************************************************************************
             for($i = 0; $i < sizeof($mapArr); $i++){
                $fieldval1 = $mapArr[$i][0]; //Name
                
                $sql = "INSERT INTO maps (Name) VALUE ('".$fieldval1."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed maps<br>";
                }
                else{
                    echo "Query did not execute maps<br>";

                }
             }
             //***************************************************************************************************************************
  
            //NPC QUERIES
            //***************************************************************************************************************************
             for($i = 0; $i < sizeof($npcArr); $i++){
                $fieldval1 = $npcArr[$i][0]; //ID
                $fieldval2 = $npcArr[$i][1]; //Tile
                $fieldval3 = $npcArr[$i][2]; //Name
                $fieldval4 = $npcArr[$i][3]; //Location
                $fieldval5 = $npcArr[$i][4]; //NumPokemon
                $fieldval6 = $npcArr[$i][5]; //MapName
                
                echo $fieldval2;
                
                $sql = "INSERT INTO npcs (NPCID, Title, Name, Location, NumPokemon, MapName) VALUE (".$fieldval1.", '".$fieldval2."', '".$fieldval3."', '".$fieldval4."', ".$fieldval5.", '".$fieldval6."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed npcs<br>";
                }
                else{
                    echo "Query did not execute npcs<br>";
                    echo("Error description:" . mysqli_errno($conn));
                }
             }
            //***************************************************************************************************************************
             

             
             //ITEMS QUERIES
             //***************************************************************************************************************************
             for($i = 0; $i < sizeof($itemArr); $i++){
                $fieldval1 = $itemArr[$i][0]; //ID
                $fieldval2 = $itemArr[$i][1]; //Name
                $fieldval3 = $itemArr[$i][2]; //Effect
                $fieldval4 = $itemArr[$i][3]; //Category
                $fieldval5 = $itemArr[$i][4]; //NPCID
                
                $sql = "INSERT INTO items (ItemID, Name, Effect, Category, NPCID) VALUE (".$fieldval1.", '".$fieldval2."', '".$fieldval3."', '".$fieldval4."', ".$fieldval5.")";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed items<br>";
                }
                else{
                    echo "Query did not execute items<br>";
                    echo("Error description:" . mysqli_errno($conn));
                }
             }
             //***************************************************************************************************************************
             
             
             //GYM QUERIES
             //***************************************************************************************************************************
             for($i = 0; $i < sizeof($gymArr); $i++){
                $fieldval1 = $gymArr[$i][0]; //Name
                $fieldval2 = $gymArr[$i][1]; //Location
                $fieldval3 = $gymArr[$i][2]; //NPCID
                $sql = "INSERT INTO gym (Name, Location, GymLeaderID) VALUE ('".$fieldval1."', '".$fieldval2."', ".$fieldval3.")";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed gym<br>";
                }
                else{
                    echo "Query did not execute gym<br>";
                }
             }
             //***************************************************************************************************************************
             
             //ITEMMAPFOUND QUERIES
             //***************************************************************************************************************************
             for($i = 0; $i < sizeof($itemmapArr); $i++){
                $fieldval1 = $itemmapArr[$i][0]; //itemID
                $fieldval2 = $itemmapArr[$i][1]; //Location
                
                $sql = "INSERT INTO itemmapfound (ItemID, MapName) VALUE (".$fieldval1.", '".$fieldval2."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed itemFound<br>";
                }
                else{
                    echo "Query did not execute itemFound<br>";
                }
             }
             //***************************************************************************************************************************
             
             //PMAPFOUND QUERIES
             //***************************************************************************************************************************
             for($i = 0; $i < sizeof($pmapArr); $i++){
                $fieldval1 = $pmapArr[$i][0]; //pID
                $fieldval2 = $pmapArr[$i][1]; //Location
                
                $sql = "INSERT INTO pmapfound (pID, MapName) VALUE (".$fieldval1.", '".$fieldval2."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed pFound<br>";
                }
                else{
                    echo "Query did not execute pFound<br>";
                    echo("Error description:" . mysqli_errno($conn));
                }
             }
             //***************************************************************************************************************************
			 
            //HMTM QUERIES
            //***************************************************************************************************************************
            for($i = 0; $i < sizeof($machineArr); $i++){
                $fieldval1 = $machineArr[$i][0]; //ID
                $fieldval2 = $machineArr[$i][1]; //BadgeReq
                $fieldval3 = $machineArr[$i][2]; //PP
                $fieldval4 = $machineArr[$i][3]; //Effect
                $fieldval5 = $machineArr[$i][4]; //Damage
                $fieldval6 = $machineArr[$i][5]; //Type
                $fieldval7 = $machineArr[$i][6]; //NPCID
                $fieldval8 = $machineArr[$i][7]; //MapName

                $sql = "INSERT INTO hmtm (IDName, BadgeRequired, PP, Effect, Damage, Type, NPCID, MapFound) VALUE ('".$fieldval1."', '".$fieldval2."', ".$fieldval3.", '".$fieldval4."', ".$fieldval5.", '".$fieldval6."', ".$fieldval7.", '".$fieldval8."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed hmtm<br>";
                }
                else{
                    echo "Query did not execute hmtm<br>";
                    echo("Error description:" . mysqli_errno($conn));
                }
            }
             //***************************************************************************************************************************
			 
            //MOVE QUERIES
            //***************************************************************************************************************************

            for($i = 0; $i < sizeof($moveArr); $i++){
                $fieldval1 = $moveArr[$i][0]; //pMoveID
                $fieldval2 = $moveArr[$i][1]; //Level
                $fieldval3 = $moveArr[$i][2]; //Move

                $sql = "INSERT INTO moves (pID, Level, Move) VALUE (".$fieldval1.", ".$fieldval2.", '".$fieldval3."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                echo "Query executed moves<br>";
                }
                else{
                    echo "Query did not execute moves<br>";
                }
            }
             //***************************************************************************************************************************
             //CANLEARN QUERIES
             //***************************************************************************************************************************
             for($i = 0; $i < sizeof($learnArr); $i++){
                $fieldval1 = $learnArr[$i][0]; //pID
                $fieldval2 = $learnArr[$i][1]; //HMID 
                
                $sql = "INSERT INTO canlearn (PokemonID, HMID) VALUE (".$fieldval1.", '".$fieldval2."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed canlearn<br>";
                }
                else{
                    echo "Query did not execute canlearn<br>";
                }
             }
             //***************************************************************************************************************************
            $conn-> close();            //close the connection to database
        ?>
    </body>
</html>
