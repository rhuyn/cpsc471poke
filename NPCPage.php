<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="generalStyle.css">
        <script src="NPCScript.js"></script>
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
                            <a href="PokemonPage.php">Pokemons</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="HMPage.php">HMs & TMs</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="NPCPage.php" style="color: white;">NPCS</a>
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
        <table id="npcEle" style="border: solid 1px white">
            <tr>
                <th style ="padding: 15px" align ="left">Title</th>
                <th style ="padding: 15px" align ="left">Name</th>
                <th style ="padding: 15px" align ="left">Number of Pokemon</th>
                <th style ="padding: 15px" align ="left">Location</th>
                <th style ="padding: 15px" align ="left">Location Area</th>
            </tr>
            <?php             
            $sql = "SELECT Title, Name, Location, NumPokemon, MapName FROM npcs WHERE NPCID > 0";
            $result = $conn->query($sql);       //execute the query
            if($result->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
            ?>
            <script>
                var a = '<?php echo $row["Title"];?>';
                var b = '<?php echo $row["Name"];?>';
                var c = '<?php echo $row["Location"];?>';
                var d = <?php echo $row["NumPokemon"];?>;
                var e = '<?php echo $row["MapName"];?>';
                createNPC(a, b, c, d, e);
            </script>
            <?php
                }
            }
            ?>
        </table>
    </body>
</html>