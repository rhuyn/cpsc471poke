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
        <script src="gymScript.js"></script>
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
                            <a href="NPCPage.php">NPCS</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="ItemPage.php">Items</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="MapPage.php">Maps</a>
                        </th>
                        <th style="border: 1px solid black;">
                            <a href="GymPage.php" style="color: white;">Gyms</a>
                        </th>
                    </tr>
                </table>
            </div>
         </div>
        <table id="gymEle" style="border: solid 1px white">
            <tr>
                <th style ="padding: 15px" align ="left">Name</th>
            </tr>
            <?php             
            $sql = "SELECT Name, GymLeaderID, Location FROM gyms";
            $result = $conn->query($sql);       //execute the query
            if($result->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
            ?>
            <script>
                var a = '<?php echo $row["Name"];?>';
                var b = <?php echo $row["GymLeaderID"];?>;
                var c = '<?php echo $row["Location"];?>';
                createGyms(a, b, c);
            </script>
            <?php
                }
            }
            ?>
        </table>
    </body>
</html>