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
                    array(1, "Red", 11, "Pallet Town", ),
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
                array(9, "Blastoise", 79, 83, 100, 85, 105, 78, "Water", "N/A", 0)
                );
            //**********************************************************************
            
            //NPCS
            //**********************************************************************
            //Format: ID, title, name, location, numb of pokemon, map
            $npcArr = array(
                array(1, "Professor", "Oak", "Pallet Town Research Lab", 0, "Pallet Town"),
                array(2, "Youngster", "Joey", "Route 30", 1, "Route 30"),
                array(3, "Gym Leader", "Brock", "Pewter Gym", 2, "Pewter City"),
                array(4, "Champion", "Cynthia", "Pokemon League", 6, "Pokemon League"),
                array(5, "PokeMart", "Clerk", "Viridian City PokeMart", 0, "Viridian City"),
                array(6, "Bicycle Shop", "Clerk", "Cerulean City Bicycle Shop", 0, "Cerulean City"),
                array(7, "Ship Captain", "Bob", "S.S. Anne", 0, "Vermilion City")
            );
            //**********************************************************************
            
            //Maps
            //**********************************************************************
            //Format: name, north, south, west, east
            $mapArr = array(
                array("Pallet Town", "Route 1", "Route 21", NULL, NULL),
                array("Route 1", "Viridian City", "PalletTown", NULL, NULL),
                array("Pewter City", NULL, "Route 2", "Route 3"),
                array("Ceruleon City", "Route 24", "Route 5", "Route 4", "Route 9"),
                array("S.S. Anne", "Vermilion City", NULL, NULL, NULL)
            );
            //**********************************************************************
            
            //Items
            //**********************************************************************
            //Format: ID, Name, Effect, Category, NPCID
            $itemArr = array(
                array(1, "Poke Ball", "Allows the player to catch wild Pokemon", "Item", 5),
                array(2, "Potion", "Heals a Pokemon by 20 HP", "Medicine", 5),
                array(3, "Bicycle", "Allows for faster travel than walking or running. Can be used to ride on Cycling Roads", "Key Item", 6)
            );
            //**********************************************************************
            
            //HMTM
            //**********************************************************************
            //Format: ID, BadgeReq, PP, Effect, Damage, Type, NPCID, MapName
            $machineArr = array(
                array("HM01", NULL, 30, "Allow User to cut trees outside of battle", 50, "Normal", 7, "S.S. Anne"),
                array("HM02", NULL, 15, "Allow User to fly to any previously visited city outside of battle", 90, "Flying", NULL, "Route 16"),
                array("HM03", NULL, 15, "Allow user to traverse water terrains", 90, "Water", NULL, NULL),
                array("TM22", NULL, 10, NULL, 120, "Grass", NULL, NULL),
                array("TM25", NULL, 10, NULL, 110, "Thunder", NULL, NULL),
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
                }
                
                //Stats table
                $sql = "INSERT INTO stats (pID, HP, Attack, Defence, SpAtk, SpDef, Speed) VALUES (".$fieldval1.", ".$fieldval3.", ".$fieldval4.", ".$fieldval5.", ".$fieldval6.", ".$fieldval7.", ".$fieldval8.")";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed stats<br>";
                }
                else{
                    echo "Query did not execute stats<br>";
                }
                
                //Ptypes table
                $sql = "INSERT INTO ptypes (pID, FirstType, SecondType) VALUES (".$fieldval1.", '".$fieldval9."', '".$fieldval10."')";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed ptype<br>";
                }
                else{
                    echo "Query did not execute ptype<br>";
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
                
                $sql = "INSERT INTO npcs (NPCID, Title, Name, Location, NumPokemon, MapName) VALUE (".$fieldval1.", '".$fieldvar2."', '".$fieldvar3."', '".$fieldval4.", ".$fieldval5.", '".$fieldval6."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed npcs<br>";
                }
                else{
                    echo "Query did not execute npcs<br>";
                }
             }
            //***************************************************************************************************************************
             
             //MAPS QUERIES
             //***************************************************************************************************************************
             for($i = 0; $i < sizeof($mapArr); $i++){
                $fieldval1 = $npcArr[$i][0]; //Name
                $fieldval2 = $npcArr[$i][1]; //North
                $fieldval3 = $npcArr[$i][2]; //South
                $fieldval4 = $mapArr[$i][3]; //West
                $fieldval5 = $mapArr[$i][4]; //East
                
                $sql = "INSERT INTO maps (Name, MapNorth, MapSouth, MapWest, MapEast) VALUE ('".$fieldval1."', '".$fieldvar2."', '".$fieldvar3."', '".$fieldval4.", '".$fieldval5."')";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed maps<br>";
                }
                else{
                    echo "Query did not execute maps<br>";
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
                
                $sql = "INSERT INTO maps (ItemID, Name, Effect, Category, NPCID) VALUE (".$fieldval1.", '".$fieldvar2."', '".$fieldvar3."', '".$fieldval4.", ".$fieldval5.")";
                echo "<br><br> Inserting into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed maps<br>";
                }
                else{
                    echo "Query did not execute maps<br>";
                }
             }
             //***************************************************************************************************************************
            $conn-> close();            //close the connection to database
        ?>
    </body>
</html>
