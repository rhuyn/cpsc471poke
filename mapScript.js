/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createMap(name)
{
    var loc = document.getElementById("mapEle");
    
    var newDiv = document.createElement("TD");
    newDiv.id = "map"+name;
    newDiv.className = "generalDiv";
    var imgDiv = document.createElement("DIV");
    imgDiv.className = "generalImgDiv";
    var infoDiv = document.createElement("DIV");
    infoDiv.className = "generalInfo";
    infoDiv.id = "mapInfo"+name;
    var newImg = document.createElement("IMG");
    newImg.className = "generalImg";
    newImg.src = name + ".png";
    imgDiv.appendChild(newImg);
    
    infoDiv.innerHTML = name;

    newDiv.appendChild(imgDiv);
    newDiv.appendChild(infoDiv);
    loc.appendChild(newDiv);
}