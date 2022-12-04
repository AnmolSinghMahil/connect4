//initialize
let data;
let usergamesdata;
let player1Discs;
let player2Discs;
let currentTurn = 0;
let player1obj = {
  color: null,
  threeInRow: 0,
};
let player2obj = {
  color: null,
  threeInRow: 0,
};
let player1 = true;
let player2 = false;
let color1 = "red"; //make player select the color
let color2 = "yellow"; // make player select the color
row = 6;
column = 7;
let frequency = {};
let startingRow = {
  //can only place your piece if it is in starting row and false
  35: false,
  36: false,
  37: false,
  38: false,
  39: false,
  40: false,
  41: false,
};
let matrix = [
  [0, 1, 2, 3, 4, 5, 6],
  [7, 8, 9, 10, 11, 12, 13],
  [14, 15, 16, 17, 18, 19, 20],
  [21, 22, 23, 24, 25, 26, 27],
  [28, 29, 30, 31, 32, 33, 34],
  [35, 36, 37, 38, 39, 40, 41],
];

/////////////////////////////
const timer = document.getElementById("timer");
let timerInterval;
let pause = false;

startTimer = () => {
  clearInterval(timerInterval);
  let second = 0,
    minute = 0,
    hour = 0;

  timerInterval = setInterval(function () {
    if (!pause) {
      timer.innerHTML =
        (hour ? hour + ":" : "") +
        (minute < 10 ? "0" + minute : minute) +
        ":" +
        (second < 10 ? "0" + second : second);

      second++;

      if (second == 60) {
        minute++;
        second = 0;
      }

      if (minute == 60) {
        hour++;
        minute = 0;
      }
    }
  }, 1000);
};

//////////////////////////////
let hiddenValue = document.getElementById("hidden").innerHTML;
let resultPost = "";
let timePlayedPost = "";

//////////////////////////////////////
let userName = document.getElementById("username");
let outterusergamesContainer = document.getElementById(
  "outterusergamesContainer"
);
let outterusergamesContainerClose = document.getElementById(
  "outterusergamesContainerButton"
);
let innerusergamesContainer = document.getElementById(
  "innerusergamesContainer"
);

outterusergamesContainerClose.addEventListener("click", () => {
  outterusergamesContainer.style.display = "none";
});

// let post = { userID: hiddenValue, result: "", timePlayed: "" };
// console.log(post);
const turn = document.getElementById("turn");
const resetButton = document.getElementById("reset");
const startButton = document.getElementById("start");
const menuContainer = document.getElementById("menuContainer");
const menu = document.getElementById("menu");
const startContainer = document.getElementById("startContainer");
const settingsButton = document.getElementById("settings");
const modal = document.getElementById("modal");
const modalLB = document.getElementById("modalLB");
const closeModal = document.getElementById("closeMenu");
const winsLB = document.getElementById("winsLB");
const lossesLB = document.getElementById("lossesLB");
const gamesplayedLB = document.getElementById("gamesplayedLB");
const timeplayedLB = document.getElementById("timeplayedLB");
let innerLeaderBoardContainer = document.getElementById(
  "innerLeaderBoardContainer"
);
const outterTableContainer = document.getElementById("outterTableContainer");
const innerTableContainer = document.getElementById("innerTableContainer");
const playerInformation = document.getElementById("playerInformation");
const playerWins = document.getElementById("playerWins");
let timePlayed = document.getElementById("timePlayed");
let leaderboardResult = document.getElementById("leaderboardresult");
let outterLeaderBoardContainerButton = document.getElementById(
  "outterLeaderBoardContainerButton"
);

let outterLeaderBoardContainer = document.getElementById(
  "outterLeaderBoardContainer"
);

leaderboardResult.addEventListener("click", () => {
  getLeaderboard();
  outterLeaderBoardContainer.style.display = "flex";
});
outterLeaderBoardContainerButton.addEventListener("click", () => {
  outterLeaderBoardContainer.style.display = "none";
});
let resetLB = () => {
  let tableRow = document.getElementsByClassName("trow");
  let tabledata = document.getElementsByClassName("tdata");

  while (tabledata.length > 0) {
    tabledata[0].parentNode.removeChild(tabledata[0]);
  }
  while (tableRow.length > 0) {
    tableRow[0].parentNode.removeChild(tableRow[0]);
  }
};

const newGame = document.getElementById("newGame");
const option1 = document.getElementById("option1");
const optionsButton = document.getElementById("options");
const option1Container = document.getElementById("option1Container");
const option2Container = document.getElementById("option2Container");
const option3Container = document.getElementById("option3Container");
const closeOption = document.getElementById("closeOption");

optionsButton.addEventListener("click", () => {
  modal.style.display = "none";
  option1Container.style.display = "block";
  restart();
});
closeOption.addEventListener("click", () => {
  option1Container.style.display = "none";
  modal.style.display = "block";
});
const helpButton = document.getElementById("help");
const helpContainer = document.getElementById("helpContainer");
const closeHelpButton = document.getElementById("closeHelp");
helpButton.addEventListener("click", () => {
  helpContainer.style.display = "flex";
});
closeHelpButton.addEventListener("click", () => {
  helpContainer.style.display = "none";
});
const contactButton = document.getElementById("contact");
const contactContainer = document.getElementById("contactContainer");
const closeContact = document.getElementById("closeContact");
contactButton.addEventListener("click", () => {
  contactContainer.style.display = "flex";
});
closeContact.addEventListener("click", () => {
  contactContainer.style.display = "none";
});

//board Color
let boardColorSelect = document.querySelectorAll(".boardColorSelect");
boardColorSelect.forEach((element) => {
  element.addEventListener("click", (e) => {
    innerTableContainer.style.backgroundColor = e.target.innerHTML;
  });
});

// player1 color
let p1ColorSelect = document.querySelectorAll(".p1ColorSelect");
p1ColorSelect.forEach((element) => {
  element.addEventListener("click", (e) => {
    color1 = e.target.innerHTML;
  });
});
//player 2 color
let p2ColorSelect = document.querySelectorAll(".p2ColorSelect");
p2ColorSelect.forEach((element) => {
  element.addEventListener("click", (e) => {
    color2 = e.target.innerHTML;
  });
});

// boardColorSelect[i].addEventListener("mouseover", () => {
//   boardColorSelect[i].style.cursor = "pointer";
// });

//resets the game
let restart = () => {
  const tableData = document.getElementsByClassName("tableData");
  const n = tableData.length;
  modal.style.display = "none";
  modalLB.style.display = "none";
  pause = false;
  turn.innerHTML = "Current Turn: 0";
  currentTurn = 0;
  playerInformation.innerHTML = "Player 1 turn";
  for (let i = 0; i < n; i++) {
    tableData[i].style.backgroundColor = "white";
  }

  startingRow = {
    35: false,
    36: false,
    37: false,
    38: false,
    39: false,
    40: false,
    41: false,
  };
  frequency = {};
  startTimer();
};
newGame.addEventListener("click", restart);
resetButton.addEventListener("click", restart);
settingsButton.addEventListener("click", () => {
  modal.style.display = "block";
  pause = true;
});
closeModal.addEventListener("click", () => {
  modal.style.display = "none";
  pause = false;
});
//call this function onload or after login/picking colors
const selectColor = () => {
  const p = document.createElement("h2");
  p.setAttribute("class", "playercolor");
  p.innerHTML = "Player 1 selec a color: ";
};

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
/// Post result

let httprequest;

// let postResult = () => {
//   httprequest = new XMLHttpRequest();
//   if (!httpRequest) {
//     alert("Cannot create an XMLHTTP instance");
//     return false;
//   }
//   let sendPost = JSON.stringify(post);
//   console.log(sendPost);
//   // httprequest.onreadystatechange = getResult;
//   httprequest.open("POST", "postResult.php");
//   httprequest.setRequestHeader(
//     "Content-type",
//     "application/json; charset=UTF-8"
//   );
//   httprequest.send(sendPost);
// };

let userGames = () => {
  httpRequest = new XMLHttpRequest();
  if (!httpRequest) {
    alert("Cannot create an XMLHTTP instance");
    return false;
  }
  httpRequest.onreadystatechange = getUserGamesServer;
  v1 = JSON.stringify(hiddenValue);
  httpRequest.open("GET", "getUsers.php?userID=" + v1);
  httpRequest.send(); // Post = send with parameter !
};

userName.addEventListener("click", () => {
  userGames();
  outterusergamesContainer.style.display = "flex";
});
let getUserGamesServer = () => {
  try {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        let str = httpRequest.responseText;
        usergamesdata = JSON.parse(str);
        resetLB();
        displayUsergames();

        // displayLeaderboard();
      }
    }
  } catch (e) {
    alert("Caught Exception: " + e.description);
  }
};

let insertItem = () => {
  httpRequest = new XMLHttpRequest();
  if (!httpRequest) {
    alert("Cannot create an XMLHTTP instance");
    return false;
  }
  // httpRequest.onreadystatechange = getJsonFromServerInsert;
  v1 = JSON.stringify(hiddenValue);
  v2 = JSON.stringify(resultPost);
  v3 = JSON.stringify("00:" + timePlayedPost);
  console.log(v3);
  // v4 = JSON.stringify(year.value);
  // v5 = JSON.stringify(image.value);
  httpRequest.open(
    "GET",
    "postResult.php?userID=" + v1 + "&result=" + v2 + "&timePlayed=" + v3
  );
  httpRequest.send(); // Post = send with parameter !
};

let getLeaderboard = () => {
  httpRequest = new XMLHttpRequest();
  if (!httpRequest) {
    alert("Cannot create an XMLHTTP instance");
    return false;
  }
  httpRequest.onreadystatechange = getLeaderboardServer;
  httpRequest.open("GET", "getLeaderboard.php");
  httpRequest.send();
};
let winsBool = false;
let winsASC = null;
let winsDESC = null;
let gamesBool = false;
let gamesASC = null;
let gamesDESC = null;
let timeBool = false;
let timeASC = null;
let timeDESC = null;
let lossBool = null;
let lossASC = null;
let lossDESC = null;

winsLB.addEventListener("click", () => {
  if (winsBool) {
    winsASC = "winsASC";
    winsBool = false;
    winsLB.innerHTML = "Wins " + "&#x25BE";
  } else {
    winsDESC = "winsDESC";
    winsBool = true;
    winsLB.innerHTML = "Wins " + "&#x25B4";
  }
  gamesplayedLB.innerHTML = "GP";
  lossesLB.innerHTML = "Losses";
  timeplayedLB.innerHTML = "TP";

  orderBy();
});
gamesplayedLB.addEventListener("click", () => {
  if (gamesBool) {
    gamesASC = "gamesASC";
    gamesBool = false;
    gamesplayedLB.innerHTML = "GP " + "&#x25BE";
  } else {
    gamesDESC = "gamesDESC";
    gamesBool = true;
    gamesplayedLB.innerHTML = "GP " + "&#x25B4";
  }
  winsLB.innerHTML = "Wins";
  lossesLB.innerHTML = "Losses";
  timeplayedLB.innerHTML = "TP";
  orderBy();
});
timeplayedLB.addEventListener("click", () => {
  if (timeBool) {
    timeASC = "timeASC";
    timeBool = false;
    timeplayedLB.innerHTML = "TP " + "&#x25BE";
  } else {
    timeDESC = "timeDESC";
    timeBool = true;
    timeplayedLB.innerHTML = "TP " + "&#x25B4";
  }
  gamesplayedLB.innerHTML = "GP";
  winsLB.innerHTML = "Wins";
  lossesLB.innerHTML = "Losses";
  orderBy();
});
lossesLB.addEventListener("click", () => {
  if (lossBool) {
    lossASC = "lossASC";
    lossBool = false;
    lossesLB.innerHTML = "Losses " + "&#x25BE";
  } else {
    lossDESC = "lossDESC";
    lossBool = true;
    lossesLB.innerHTML = "Losses " + "&#x25B4";
  }
  winsLB.innerHTML = "Wins";
  gamesplayedLB.innerHTML = "GP";
  timeplayedLB.innerHTML = "TP";

  orderBy();
});

let orderBy = () => {
  httpRequest = new XMLHttpRequest();
  if (!httpRequest) {
    alert("Cannot create an XMLHTTP instance");
    return false;
  }
  let v1 = JSON.stringify(winsASC);
  let v2 = JSON.stringify(winsDESC);
  let v3 = JSON.stringify(gamesASC);
  let v4 = JSON.stringify(gamesDESC);
  let v5 = JSON.stringify(timeASC);
  let v6 = JSON.stringify(timeDESC);
  let v7 = JSON.stringify(lossASC);
  let v8 = JSON.stringify(lossDESC);
  httpRequest.onreadystatechange = getLeaderboardServer;
  httpRequest.open(
    "GET",
    "orderBy.php?winsASC=" +
      v1 +
      "&winsDESC=" +
      v2 +
      "&gamesASC=" +
      v3 +
      "&gamesDESC=" +
      v4 +
      "&timeASC=" +
      v5 +
      "&timeDESC=" +
      v6 +
      "&lossASC=" +
      v7 +
      "&lossDESC=" +
      v8
  );
  httpRequest.send();
};
let getLeaderboardServer = () => {
  try {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        let str = httpRequest.responseText;
        data = JSON.parse(str);
        winsASC = null;
        winsDESC = null;
        gamesASC = null;
        gamesDESC = null;
        timeASC = null;
        timeDESC = null;
        lossASC = null;
        lossDESC = null;
        resetLB();
        displayLeaderboard();
      }
    }
  } catch (e) {
    alert("Caught Exception: " + e.description);
  }
};

let displayLeaderboard = () => {
  let n = data.length;

  for (let i = 0; i < n; i++) {
    let tr = document.createElement("div");
    tr.setAttribute("class", "trow");
    let td1 = document.createElement("div");
    td1.setAttribute("class", "tdata");
    let td2 = document.createElement("div");
    td2.setAttribute("class", "tdata");
    let td3 = document.createElement("div");
    td3.setAttribute("class", "tdata");
    let td4 = document.createElement("div");
    td4.setAttribute("class", "tdata");
    let td5 = document.createElement("div");
    td5.setAttribute("class", "tdata");

    innerLeaderBoardContainer.appendChild(tr);
    td1.innerHTML = data[i].username;
    tr.appendChild(td1);
    td2.innerHTML = data[i].wins;
    tr.appendChild(td2);
    td3.innerHTML = data[i].losses;
    tr.appendChild(td3);
    td4.innerHTML = data[i].totalgames;
    tr.appendChild(td4);
    td5.innerHTML =
      Math.floor(data[i].timeplayed / 60) < 2
        ? Math.floor(data[i].timeplayed / 60) + "min"
        : Math.floor(data[i].timeplayed / 60) + "mins";
    tr.appendChild(td5);
  }
};

let displayUsergames = () => {
  let n = usergamesdata.length;
  console.log(usergamesdata);
  usergamesdata.map((item) => {
    let tr = document.createElement("div");
    tr.setAttribute("class", "trow");
    let td1 = document.createElement("div");
    td1.setAttribute("class", "tdata");
    let td2 = document.createElement("div");
    td2.setAttribute("class", "tdata");
    let td3 = document.createElement("div");
    td3.setAttribute("class", "tdata");

    innerusergamesContainer.appendChild(tr);
    td1.innerHTML = item.gamesID;
    tr.appendChild(td1);
    td2.innerHTML = item.result;
    tr.appendChild(td2);
    td3.innerHTML = item.timeplayed.slice(0, 8);
    console.log(item.timeplayed);
    tr.appendChild(td3);
  });
  // console.log(n);
  // console.log(item[0].gamesID);
};
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

// table of 7 columns and 6 rows
// call this function onload, or afterlogin or picking color
const connect4 = () => {
  outterTableContainer.style.display = "flex";

  let table = document.createElement("table");
  console.log(innerTableContainer);
  innerTableContainer.appendChild(table);
  for (let i = 0; i < 6; i++) {
    let tr = document.createElement("tr");
    table.appendChild(tr);
    for (let j = 0; j <= 6; j++) {
      let td = document.createElement("td");
      td.setAttribute("class", "tableData");
      //td.innerHTML = j + 1;
      tr.appendChild(td);
    }
  }
  let res = document.createElement("button");
  res.innerHTML = "Restart";
  res.setAttribute("id", "res");
  // body.appendChild(res);
  // divA.appendChild(res);
};

// window.onload = connect4();
//picking where to place your piece on what tile
const select = () => {
  const tableData = document.getElementsByClassName("tableData");
  const n = tableData.length;
  // additional feature
  //   for (let i = 0; i < n; i++) {
  //     tableData[i].addEventListener("mouseover", (e) => {
  //       tableData[i].style.backgroundColor = color;
  //       tableData[i].style.cursor = "pointer";
  //       tableData[i].addEventListener("mouseleave", () => {
  //         tableData[i].style.backgroundColor = "black";
  //       });
  //     });
  //   }

  for (let i = 0; i < n; i++) {
    //loop over all 42 tiles
    tableData[i].addEventListener("click", (e) => {
      // select the tiles/index that has been clicked on and place your piece
      let color = "";
      //if the tile/index in startingrow and is false then you can place your piece in that index
      currentTurn += 1;
      turn.innerHTML = "Current Turn:" + currentTurn;
      if (i in startingRow && startingRow[i] == false) {
        if (player1) {
          // check if it is player 1 or 2

          tableData[i].style.backgroundColor = color1;
          color1 = color1.toLowerCase();
          color = tableData[i].style.backgroundColor;
          player1 = false;
          player2 = true;

          playerInformation.innerHTML = "Player 2 turn";
        } else if (player2) {
          tableData[i].style.backgroundColor = color2;
          color2 = color2.toLowerCase();
          color = tableData[i].style.backgroundColor;
          player1 = true;
          player2 = false;
          playerInformation.innerHTML = "Player 1 turn";
        }

        let index = i;

        caluclation1(index, color, player1, player2); // winning condition

        //update where we can place are next piece in the tile
        startingRow[i] = true; //cant place, it's occupied
        startingRow[i - 7] = false; // can place a piece in this tile

        //e.target.removeEventListener("mouseleave", hover, true);
      }
    });
    tableData[i].addEventListener("mouseover", () => {
      tableData[i].style.cursor = "pointer";
    });
  }
};

startButton.addEventListener("click", () => {
  startTimer();
  connect4();
  select();
  settingsButton.style.display = "flex";
  startContainer.style.display = "none";
  startTime = performance.now();
});

let caluclation1 = (index, color) => {
  if (!(index in frequency)) {
    frequency[index] = color;
  }
  console.log(color1);
  console.log(color2);

  let declareWinner = ({ i, j, player1Discs = 0, player2Discs = 0 }) => {
    if (frequency[matrix[i][j]] == color1) {
      player1Discs += 1;
      player2Discs = 0;
      console.log("hefsef");
      if (player1Discs == 4) {
        if (player2) {
          playerWins.innerHTML = "Player 1 wins!";
          modalLB.style.display = "block";
          timePlayed.innerHTML = "Time Played: " + timer.innerHTML;
          resultPost = "Win";
          timePlayedPost = timer.innerHTML;
          // postResult();
          insertItem();
          clearInterval(timerInterval);
        }
        console.log("Red wins");
      }
    } else if (frequency[matrix[i][j]] == color2) {
      player2Discs += 1;
      player1Discs = 0;
      if (player2Discs == 4) {
        if (player1) {
          playerWins.innerHTML = "Player 2 wins!!";
          modalLB.style.display = "block";
          timePlayed.innerHTML = "Time Played: " + timer.innerHTML;
          resultPost = "Loss";
          timePlayedPost = timer.innerHTML;
          // postResult();
          insertItem();
          clearInterval(timerInterval);
        }
        console.log("yellow wins");
      }
    } else {
      player1Discs = 0;
      player2Discs = 0;
    }
    return { player1Discs, player2Discs };
  };

  const horizontal = () => {
    console.log("hello");
    for (let i = 0; i < 6; i++) {
      for (let j = 0; j < 7; j++) {
        var { player1Discs: player1Discs, player2Discs: player2Discs } =
          declareWinner({
            i,
            j,
            player1Discs,
            player2Discs,
          });
      }
    }
  };
  const vertical = () => {
    for (let j = 0; j < 7; j++) {
      for (let i = 0; i < 6; i++) {
        var { player1Discs: player1Discs, player2Discs: player2Discs } =
          declareWinner({
            i,
            j,
            player1Discs,
            player2Discs,
          });
      }
    }
  };
  const topLeftToBottomRightUpper = () => {
    let j = 0;
    let i = 0;
    let temp1 = 0;
    for (k = 0; k <= 3; k++) {
      while (i <= 5 && j <= 6) {
        var { player1Discs: player1Discs, player2Discs: player2Discs } =
          declareWinner({
            i,
            j,
            player1Discs,
            player2Discs,
          });

        i = i + 1;
        j = j + 1;
      }
      temp1 += 1;
      j = temp1;
      i = 0;
    }
  };

  const topLeftToBottomRightDown = () => {
    let j = 0;
    let i = 1;

    let temp1 = 1;
    for (k = 0; k <= 1; k++) {
      while (i <= 5 && j <= 4) {
        var { player1Discs: player1Discs, player2Discs: player2Discs } =
          declareWinner({
            i,
            j,
            player1Discs,
            player2Discs,
          });
        i += 1;
        j += 1;
      }
      temp1 += 1;
      j = 0;
      i = temp1;
    }
  };

  const topRightToBottomLeftUp = () => {
    let i = 0;
    let j = 6;
    let temp = 6;

    for (k = 0; k <= 3; k++) {
      while (i <= 5 && j >= 0) {
        var { player1Discs: player1Discs, player2Discs: player2Discs } =
          declareWinner({
            i,
            j,
            player1Discs,
            player2Discs,
          });
        i += 1;
        j -= 1;
      }

      temp -= 1;
      j = temp;
      i = 0;
    }
  };
  const topRightToBottomLeftDown = () => {
    let i = 1;
    let j = 6;
    let temp = 1;
    let temp1 = 6;

    for (k = 0; k <= 1; k++) {
      while (i <= 5 && j >= 0) {
        var { player1Discs: player1Discs, player2Discs: player2Discs } =
          declareWinner({
            i,
            j,
            player1Discs,
            player2Discs,
          });
        i += 1;
        j -= 1;
      }

      temp += 1;
      j = temp1;
      i = temp;
    }
  };
  topLeftToBottomRightUpper();
  topLeftToBottomRightDown();
  topRightToBottomLeftUp();
  topRightToBottomLeftDown();
  horizontal();
  vertical();
};
