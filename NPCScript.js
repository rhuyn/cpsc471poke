/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function createNPC(title, name, location, numP, map){
    var loc = document.getElementById("npcEle");

    var twoRow = document.createElement("TR");
    
    var infoData1 = document.createElement("TD");
    infoData1.style.padding = "15px";
    var infoVal1 = document.createTextNode(title);
    infoData1.appendChild(infoVal1);
    twoRow.appendChild(infoData1);
    var infoData2 = document.createElement("TD");
    infoData2.style.padding = "15px";
    var infoVal2 = document.createTextNode(name);
    infoData2.appendChild(infoVal2);
    twoRow.appendChild(infoData2);
    var infoData3 = document.createElement("TD");
    infoData3.style.padding = "15px";
    var infoVal3 = document.createTextNode(numP);
    infoData3.appendChild(infoVal3);
    twoRow.appendChild(infoData3);
    var infoData4 = document.createElement("TD");
    infoData4.style.padding = "15px";
    var infoVal4 = document.createTextNode(location);
    infoData4.appendChild(infoVal4);
    twoRow.appendChild(infoData4);
    var infoData5 = document.createElement("TD");
    infoData5.style.padding = "15px";
    var infoVal5 = document.createTextNode(map);
    infoData5.appendChild(infoVal5);
    twoRow.appendChild(infoData5);
    loc.appendChild(twoRow);

}