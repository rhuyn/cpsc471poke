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
            $tIDArr = arry(1,2,3,4,5,6,7,8);
            $tNameArr = array("Red", "Ethan", "Brendan", "Lucas", "Hilbert", "Nate", "Calem", "Sun");
            $tAge = array(11, 11, 12, 13, 14, 13, 16, 16);
            $tTown = array("Pallet Town", "New Bark Town", "Littleroot Town", "Twinleaf Town", "Nuvema Town", "Aspertia City", "Vaniville Town", "Route 1");
            //**********************************************************************
            
            //Pokemons
            //**********************************************************************
            //Fortmat: ID, Name, HP, Atk, Def, Sp.Atk, Sp.Def, Speed, Type1, Type2
            $pArr = array(
                array(1, "Bulbasaur", 45, 49, 49, 65, 65, 45, "Grass", "Poison"),
                array(2, "Ivysaur", 60, 62, 63, 80, 80, 60, "Grass", "Poison"),
                array(3, "Venusaur", 80, 82, 83, 100, 100, 80, "Grass", "Poison"),
                array(4, "Charmander", 39, 52, 43, 60, 50, 65, "Fire", "N/A"),
                array(5, "Charmeleon", 58, 64, 58, 80, 65, 80, "Fire", "N/A"),
                array(6, "Charizard", 78, 84, 78, 109, 85, 100, "Fire", "Flying"),
                array(7, "Squirtle", 44, 48, 65, 50, 64, 43, "Water", "N/A"),
                array(8, "Wartortle", 59, 63, 80, 65, 80, 58, "Water", "N/A"),
                array(9, "Blastoise", 79, 83, 100, 85, 105, 78, "Water", "N/A")
                );
            //**********************************************************************
            
            //Server Info
            //**********************************************************************
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "abcd1234";             //your localhost root password
            $db = "testingdb";                     //your database name
            //**********************************************************************
            $conn = new mysqli($servername, $username, $password, $db);
            
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }else{
                echo "Connected<br>";
            }
            //TRAINER QUERIES
            //***************************************************************************************************
            //sql query enter all trainer's info
            for($i = 0; $i < sizeof($tIDArr); $i++){
                $fieldval1 = $tIDArr[$i];
                $fieldval2 = $tNameArr[$i];
                $fieldval3 = $tAge[$i];
                $fieldval4 = $tTown[$i];
                $sql = "INSERT INTO trainer (trainerID, Name, Age, StartingTown) VALUES (". $fieldval1 .", '". $fieldval2 ."', ". $fieldval3 .", '". $fieldval4 ."')";
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
            for($i = 0; $i < sizeof($tNameArr); $i++){
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
                
                //Pokemon table
                $sql = "INSERT INTO pokemon (pID, Name) VALUES (".$fieldval1.", '".$fieldval2."')";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed pokemon<br>";
                }
                else{
                    echo "Query did not execute pokemon<br>";
                }
                
                //Stats table
                $sql = "INSERT INTO stats (HP, Attack, Defence, SpAtk, SpDef, Speed) VALUES (".$fieldval3.", ".$fieldval4.", ".$fieldval5.", ".$fieldval6.", ".$fieldval7.", ".$fieldval8.")";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed stats<br>";
                }
                else{
                    echo "Query did not execute stats<br>";
                }
                
                //Ptypes table
                $sql = "INSERT INTO ptypes (FirstType, SecondType) VALUES ('".$fieldval9."', '".$fieldval10."')";
                echo "<br><br>Inserting  into db: ";
                if($conn->query($sql)==TRUE){       //try executing the query 
                    echo "Query executed ptype<br>";
                }
                else{
                    echo "Query did not execute ptype<br>";
                }
                
            }
            
            
            //***************************************************************************************************************************

            $conn-> close();            //close the connection to database
        ?>
    </body>
</html>
