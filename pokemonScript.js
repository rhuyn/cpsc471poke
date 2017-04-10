/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function createPokemon(pid, name)
{
    var loc = document.getElementById("pokeEle");
    var newDiv = document.createElement("DIV");
    newDiv.id = "pokemon"+pid;
    newDiv.className = "generalDiv";
    var imgDiv = document.createElement("DIV");
    imgDiv.className = "generalImgDiv";
    var infoDiv = document.createElement("DIV");
    infoDiv.className = "generalInfo";
    infoDiv.id = "pokemonInfo"+pid;
    var newImg = document.createElement("IMG");
    newImg.className = "generalImg";
    newImg.src = name + ".png";
    imgDiv.appendChild(newImg);
    
    infoDiv.innerHTML = name;

    newDiv.appendChild(imgDiv);
    newDiv.appendChild(infoDiv);
    loc.appendChild(newDiv);
}

function createStats(pid, hp, attack, defence, spatk, spdef, speed)
{
    var loc = document.getElementById("pokemon"+pid);
    
    
    var newDiv = document.createElement("DIV");
    newDiv.className = "statsDiv";
    var newTable = document.createElement("TABLE");
    newTable.className = "statsTable";
    var oneRow = document.createElement("TR");
    var twoRow = document.createElement("TR");
    
    var nameData1 = document.createElement("TD");
    var nameVal1 = document.createTextNode("HP");
    nameData1.appendChild(nameVal1);
    oneRow.appendChild(nameData1);
    
    var nameData2 = document.createElement("TD");
    var nameVal2 = document.createTextNode("Attack");
    nameData2.appendChild(nameVal2);
    oneRow.appendChild(nameData2);
    
    var nameData3 = document.createElement("TD");
    var nameVal3 = document.createTextNode("Defence");
    nameData3.appendChild(nameVal3);
    oneRow.appendChild(nameData3);
    
    var nameData4 = document.createElement("TD");
    var nameVal4 = document.createTextNode("Special Attack");
    nameData4.appendChild(nameVal4);
    oneRow.appendChild(nameData4);
    
    var nameData5 = document.createElement("TD");
    var nameVal5 = document.createTextNode("Special Defence");
    nameData5.appendChild(nameVal5);
    oneRow.appendChild(nameData5);
    
    var nameData6 = document.createElement("TD");
    var nameVal6 = document.createTextNode("Speed");
    nameData6.appendChild(nameVal6);
    oneRow.appendChild(nameData6);
    
    var statData1 = document.createElement("TD");
    var statVal1 = document.createTextNode(hp);
    statData1.appendChild(statVal1);
    twoRow.appendChild(statData1);
    
    var statData2 = document.createElement("TD");
    var statVal2 = document.createTextNode(attack);
    statData2.appendChild(statVal2);
    twoRow.appendChild(statData2);
    
    var statData3 = document.createElement("TD");
    var statVal3 = document.createTextNode(defence);
    statData3.appendChild(statVal3);
    twoRow.appendChild(statData3);
    
    var statData4 = document.createElement("TD");
    var statVal4 = document.createTextNode(spatk);
    statData4.appendChild(statVal4);
    twoRow.appendChild(statData4);
    
    var statData5 = document.createElement("TD");
    var statVal5 = document.createTextNode(spdef);
    statData5.appendChild(statVal5);
    twoRow.appendChild(statData5);

    var statData6 = document.createElement("TD");
    var statVal6 = document.createTextNode(speed);
    statData6.appendChild(statVal6);
    twoRow.appendChild(statData6);
    
    newTable.appendChild(oneRow);
    newTable.appendChild(twoRow);
    
    newDiv.appendChild(newTable);
    loc.appendChild(newDiv);
}

function createMoves(pid, level, move){
    if(document.getElementById("moveTable"+pid)){
        var newRow = document.createElement("TR");
        var data1 = document.createElement("TD");
        var val1 = document.createTextNode(level);
        var data2 = document.createElement("TD");
        var val2 = document.createTextNode(move);
        
        data1.appendChild(val1);
        newRow.appendChild(data1);
        data2.appendChild(val2);
        newRow.appendChild(data2);
        document.getElementById("moveTable"+pid).appendChild(newRow);
    }
    else{
        var newTable = document.createElement("TABLE");
        newTable.id = "moveTable"+pid;
        var newRow = document.createElement("TR");
        var data1 = document.createElement("TD");
        var val1 = document.createTextNode("Level");
        var data2 = document.createElement("TD");
        var val2 = document.createTextNode("Move");
        
        data1.appendChild(val1);
        newRow.appendChild(data1);
        data2.appendChild(val2);
        newRow.appendChild(data2);
        newTable.appendChild(newRow);
        document.getElementById("pokemon"+pid).appendChild(newTable);
        createMoves(pid, level, move);
    }
}