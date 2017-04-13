/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createGyms(name, leaderID, location)
{
    var loc = document.getElementById("gymEle");

    var twoRow = document.createElement("TR");
    
    var infoData1 = document.createElement("TD");
    var infoData2 = document.createElement("TD");
    var infoData3 = document.createElement("TD");
    
    infoData1.style.padding = "15px";
    infoData2.style.padding = "15px";
    infoData3.style.padding = "15px";
    
    var infoVal1 = document.createTextNode(name);
    var infoVal2 = document.createTextNode(leaderID);
    var infoVal3 = document.createTextNode(location);
    
    infoData1.appendChild(infoVal1);
    infoData2.appendChild(infoVal2);
    infoData3.appendChild(infoVal3);
    
    var newImg = document.createElement("IMG");
    newImg.className = "generalImg";
    newImg.src = name + ".png";
    newImg.alt = "Picture of " + name;
    
    twoRow.appendChild(infoData1);
    twoRow.appendChild(infoData2);
    twoRow.appendChild(infoData3);
    twoRow.appendChild(newImg);
    
    loc.appendChild(twoRow);
    
}