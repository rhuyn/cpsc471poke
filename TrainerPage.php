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
        <link rel="stylesheet" type="text/css" href="trainerStyle.css">
        <script src="trainerScript.js"></script>
    </head>
    <body Style="background-image: url('pokeballBK.png'); opacity: 30%;">
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
                            <a href="TrainerPage.php" style="color: white;">Trainers</a>
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
                            <a href="GymPage.php">Gyms</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div id="trainerEle">
            <?php             
            $sql = "SELECT Name, Age, StartingTown FROM trainer WHERE TrainerID > 0";
            $result = $conn->query($sql);       //execute the query
            $num_rows = mysqli_num_rows($result);
            if($result->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
            ?>
            <script>
                var a = '<?php echo $row["Name"];?>';
                var b = <?php echo $row["Age"];?>;
                var c = '<?php echo $row["StartingTown"];?>';
                createTrainers(a, b, c);
            </script>
            <?php
                }
            }
            ?>
        </div>

    </body>
</html>
