/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createHM(id, badge, pp, effect, damage, type, npc, mapfound)
{
    var loc = document.getElementById("hmEle");

    var twoRow = document.createElement("TR");
    
    var infoData1 = document.createElement("TD");
    infoData1.style.padding = "15px";
    var infoVal1 = document.createTextNode(id);
    infoData1.appendChild(infoVal1);
    twoRow.appendChild(infoData1);
    var infoData2 = document.createElement("TD");
    infoData2.style.padding = "15px";
    var infoVal2 = document.createTextNode(badge);
    infoData2.appendChild(infoVal2);
    twoRow.appendChild(infoData2);
    var infoData3 = document.createElement("TD");
    infoData3.style.padding = "15px";
    var infoVal3 = document.createTextNode(pp);
    infoData3.appendChild(infoVal3);
    twoRow.appendChild(infoData3);
    if(!effect){
        var infoData4 = document.createElement("TD");
        infoData4.style.padding = "15px";
        var infoVal4 = document.createTextNode("None");
        infoData4.appendChild(infoVal4);
        twoRow.appendChild(infoData4);
    }
    else{
        var infoData4 = document.createElement("TD");
        infoData4.style.padding = "15px";
        var infoVal4 = document.createTextNode(effect);
        infoData4.appendChild(infoVal4);
        twoRow.appendChild(infoData4);
    }
    var infoData5 = document.createElement("TD");
    infoData5.style.padding = "15px";
    var infoVal5 = document.createTextNode(damage);
    infoData5.appendChild(infoVal5);
    twoRow.appendChild(infoData5);
    var infoData6 = document.createElement("TD");
    infoData6.style.padding = "15px";
    var infoVal6 = document.createTextNode(type);
    infoData6.appendChild(infoVal6);
    twoRow.appendChild(infoData6);
    if(npc ===" "){
        var infoData7 = document.createElement("TD");
        infoData7.style.padding = "15px";
        var infoVal7 = document.createTextNode("Nobody");
        infoData7.appendChild(infoVal7);
        twoRow.appendChild(infoData7);
    }
    else{
        var infoData7 = document.createElement("TD");
        infoData7.style.padding = "15px";
        var infoVal7 = document.createTextNode(npc);
        infoData7.appendChild(infoVal7);
        twoRow.appendChild(infoData7);
    }
    if(mapfound === "Unknown"){
        var infoData8 = document.createElement("TD");
        infoData8.style.padding = "15px";
        var infoVal8 = document.createTextNode("Nowhere");
        infoData8.appendChild(infoVal8);
        twoRow.appendChild(infoData8);
    }
    else{
        var infoData8 = document.createElement("TD");
        infoData8.style.padding = "15px";
        var infoVal8 = document.createTextNode(mapfound);
        infoData8.appendChild(infoVal8);
        twoRow.appendChild(infoData8);
    }
    
    loc.appendChild(twoRow);
}

function createTitles(){
    var loc = document.getElementById("hmEle");
    var oneRow = document.createElement("TR");
    var nameData1 = document.createElement("TH");
    nameData1.style.padding = "15px";
    var nameVal1 = document.createTextNode("Name");
    nameData1.appendChild(nameVal1);
    oneRow.appendChild(nameData1);
    var nameData2 = document.createElement("TH");
    nameData2.style.padding = "15px";
    var nameVal2 = document.createTextNode("Badge Required");
    nameData2.appendChild(nameVal2);
    oneRow.appendChild(nameData2);
    var nameData3 = document.createElement("TH");
        nameData3.style.padding = "15px";
    var nameVal3 = document.createTextNode("PP");
    nameData3.appendChild(nameVal3);
    oneRow.appendChild(nameData3);
    var nameData4 = document.createElement("TH");
        nameData4.style.padding = "15px";
    var nameVal4 = document.createTextNode("Effect");
    nameData4.appendChild(nameVal4);
    oneRow.appendChild(nameData4);
    var nameData5 = document.createElement("TH");
        nameData5.style.padding = "15px";
    var nameVal5 = document.createTextNode("Damage");
    nameData5.appendChild(nameVal5);
    oneRow.appendChild(nameData5);
    var nameData6 = document.createElement("TH");
        nameData6.style.padding = "15px";
    var nameVal6 = document.createTextNode("Type");
    nameData6.appendChild(nameVal6);
    oneRow.appendChild(nameData6);
    var nameData7 = document.createElement("TH");
        nameData7.style.padding = "15px";
    var nameVal7 = document.createTextNode("Given By");
    nameData7.appendChild(nameVal7);
    oneRow.appendChild(nameData7);
    var nameData8 = document.createElement("TH");
        nameData8.style.padding = "15px";
    var nameVal8 = document.createTextNode("Found In");
    nameData8.appendChild(nameVal8);
    oneRow.appendChild(nameData8);
    loc.appendChild(oneRow);
}