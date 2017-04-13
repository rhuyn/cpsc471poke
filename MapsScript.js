/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createMaps(name)
{
    var loc = document.getElementById("mapEle");

    var twoRow = document.createElement("TR");
    var threeRow = document.createElement("TR");
    
    var infoData1 = document.createElement("TD");
    infoData1.style.padding = "15px";
    
    var infoVal1 = document.createTextNode(name);
    infoData1.appendChild(infoVal1);
    
    if(name !== "Unknown")
    {
        if(name === "S.S. Anne")
        {
            name = "SS Anne";
        }
        var imgDat = document.createElement("TD");
        var newImg = document.createElement("IMG");
        newImg.style.border="none";
        newImg.src = name + ".png";
        newImg.alt = "Picture of " + name;

        imgDat.appendChild(newImg);

        threeRow.appendChild(imgDat);
    }
    
    twoRow.appendChild(infoData1);
    
    loc.appendChild(twoRow);
    loc.appendChild(threeRow);
}