<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokemon</title>
        <link rel="stylesheet" type="text/css" href="generalStyle.css"/>
        <link rel="stylesheet" type="text/css" href="pokemonStyle.css"/>
        <script src="pokemonScript.js"></script>
    </head>
    <body Style="background-image: url('pokeballBK.png'); opacity: 30%; background-repeat: no-repeat; background-size: cover">
        <?php
            
            //Server Info
            //**********************************************************************
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "abcd1234";             //your localhost root password
            $db = "tempdb";                     //your database name
            //**********************************************************************
            $conn = new mysqli($servername, $username, $password, $db);
        ?>
        <script>

        </script>
        
        <div style="background-color: #EF1A35; padding: 2% 0.5% 0% 0.5%;">
            <a href = "MainPage.php">
                <img src="pokemonLogo.png" width="20%" alt="" />
            </a>
            <div>
                <table width="100%" style="border: 1px solid black; table-layout: fixed;">
                    <tr>
                        <th style="border: 1px solid black;">
                            <a href="TrainerPage.php">Trainers</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="PokemonPage.php" style="color: white;">Pokemons</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="HMPage.php">HMs & TMs</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="NPCPage.php">NPCS</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="ItemPage.php">Items</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="MapPage.php">Maps</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="GymPage.php">Gyms</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div id="pokeEle">
            <?php             
            $sql = "SELECT PokemonID, Name FROM pokemon ORDER BY PokemonID";
            $result = $conn->query($sql);       //execute the query
            if($result->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
            ?>
            <script>
                var a = <?php echo $row["PokemonID"];?>;
                var b = '<?php echo $row["Name"];?>';
                createPokemon(a,b);
            </script>
            <?php
                }
            }
            ?> 
            
            <?php             
            $sql2 = "SELECT s.pID, s.HP, s.Attack, s.Defence, s.SpAtk, s.SpDef, s.Speed, p.FirstType, p.SecondType FROM stats as s, ptypes as p WHERE s.pID = p.pID ORDER BY pID";
            $result2 = $conn->query($sql2);       //execute the query     
            if($result2->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result2->fetch_assoc()){   //loop until all rows in result are fetched
            ?>
            <script>
                var a = <?php echo $row["pID"];?>;
                var b = <?php echo $row["HP"];?>;
                var c = <?php echo $row["Attack"];?>;
                var d = <?php echo $row["Defence"];?>;
                var e = <?php echo $row["SpAtk"];?>;
                var f = <?php echo $row["SpDef"];?>;
                var g = <?php echo $row["Speed"];?>;
                var h = '<?php echo $row["FirstType"];?>';
                var i = '<?php echo $row["SecondType"];?>';
                createStats(a,b,c,d,e,f,g,h,i);
            </script>
            <?php
                }
            }
            ?>
            
            <?php             
            $sql3 = "SELECT pID, Level, Move FROM moves ORDER BY pID";
            $result3 = $conn->query($sql3);       //execute the query
            if($result3->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result3->fetch_assoc()){   //loop until all rows in result are fetched
            ?>
            <script>
                var a = <?php echo $row["pID"];?>;
                var b = <?php echo $row["Level"];?>;
                var c = '<?php echo $row["Move"];?>';
                createMoves(a,b,c);
            </script>
            <?php
                }
            }
            ?> 
        </div>


    </body>
</html>
