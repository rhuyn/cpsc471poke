/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function createTrainers(name, age, startingLoc)
{
    var loc = document.getElementById("trainerEle");
    var newDiv = document.createElement("DIV");
    newDiv.className = "trainerDiv";
    var imgDiv = document.createElement("DIV");
    imgDiv.className = "trainerImgDiv";
    var infoDiv = document.createElement("DIV");
    infoDiv.className = "trainerInfo";
    var newImg = document.createElement("IMG");
    newImg.className = "trainerImg";
    newImg.src = name + ".png";
    imgDiv.appendChild(newImg);

    var newTable = document.createElement("TABLE");
    var oneRow = document.createElement("TR");
    var twoRow = document.createElement("TR");
    var nameData = document.createElement("TD");
    var nameVal = document.createTextNode("Name: " + name);
    nameData.appendChild(nameVal);
    oneRow.appendChild(nameData);
    var ageData = document.createElement("TD");
    var ageVal = document.createTextNode("Age: " + age);
    ageData.appendChild(ageVal);
    twoRow.appendChild(ageData);
    var locData = document.createElement("TD");
    var locVal = document.createTextNode("Starting Location: " + startingLoc);
    locData.appendChild(locVal);
    twoRow.appendChild(locData);
    newTable.appendChild(oneRow);
    newTable.appendChild(twoRow);

    infoDiv.appendChild(newTable);
    newDiv.appendChild(imgDiv);
    newDiv.appendChild(infoDiv);
    loc.appendChild(newDiv);
}

