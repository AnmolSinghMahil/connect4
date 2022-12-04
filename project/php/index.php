<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login_mysql.php");
  exit;
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Project - Connect 4</title>
    <link rel="stylesheet" href="../main.css" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap"
      rel="stylesheet"
    />
    <!-- icon -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
  </head>
  <body>
    <nav>
      <div id="navBar">
        <div id="logo">Connect 4</div>
        <div id="username"><?php echo $_SESSION['username']; ?></div>
        <div id="hidden" style="display:none"><?php echo $_SESSION["userID"]?></div>
        <div id="setLog">
          <div id="settings">
            <div class="material-symbols-outlined">settings</div>
          </div>
          <div>
            <a href="logout_mysql.php"> <button id="logout">Logout</button></a>
          </div>
        </div>
      </div>
    </nav>

    <section id="menuSection">
      <div id="modal">
        <div id="menuContainer">
          <div id="menu">
            <button class="buttons" id="reset">Restart</button>
            <button class="buttons" id="options">Options</button>
            <button class="buttons" id="help">Help</button>
            <button class="buttons" id="contact" >Contact</button>
            <button class="buttons" id="leaderboardresult">Leaderboard</button>
            <button class="buttons" id="closeMenu">X</button>
          </div>
        </div>
      </div>
      <section id="optionsSection">
      <div id="option1Container">
        
        <div id="option1">
          <p> Change board color:</p>
          <button id="boardBlue" class="boardColorSelect">Blue</button>
          <button id="boardGreen" class="boardColorSelect">Green</button>
          <button id="boardBlack" class="boardColorSelect">Black</button>
          <button id="boardPurple" class="boardColorSelect">Grey</button>
          <button id="boardKhaki" class="boardColorSelect">Khaki</button>
        </div>
      
        
       
        <div id="option2">
        <p> Player 1 disc color:</p>
          <button id="discChocolate" class="p1ColorSelect">Chocolate</button>
          <button id="discBrown" class="p1ColorSelect">Brown</button>
          <button id="discBlueViolet" class="p1ColorSelect">BlueViolet</button>
          <button id="discCoral" class="p1ColorSelect">Coral</button>
          <button id="discDarkSlateBlue" class="p1ColorSelect">DarkSlateBlue</button>
        </div>
      
      
        <div id="option3">
          <p> Player 2 disc color:</p>
        <button id="discAqua" class="p2ColorSelect">Aqua</button>
          <button id="discDarkMagenta" class="p2ColorSelect">DarkMagenta</button>
          <button id="discDarkOrange" class="p2ColorSelect">DarkOrange</button>
          <button id="discForesGreen" class="p2ColorSelect">ForestGreen</button>
          <button id="discFuchsia" class="p2ColorSelect">Fuchsia</button>
        </div>
        <button id="closeOption">X</button>
        </div>
    </section>
      <section id="help">
        <div id="helpContainer">
          <div id="helpList">
            <h4>Connect 4 Rules (How to play the game)</h4>
            <ul>
              <li>
                To be the first player to connect 4 of the same colored discs in
                a row
              </li>
              <li>
                First, decide who goes first and what color each player will
                have.
              </li>
              <li>
                Players must alternate turns, and only one disc can be dropped
                in each turn.
              </li>
              <li>
                On your turn, drop one of your colored discs from the top into
                any of the seven slots.
              </li>
              <li>The game ends when there is a 4-in-arow or a stalemate.</li>
              <li>
                The starter of the previous game goes second on the next game.
              </li>
            </ul>

            <button id="closeHelp">X</button>
          </div>
        </div>
      </section>
      <section id="contact">
        <div id="contactContainer">
          <div id="contactList">
            <h4 id="titleContact">CONTACT INFO</h4>
            <div> <p> Anmol Singh </p> 
            <p> Description: Hello, I am one of the authors of the game, if you
              have any question about the project, contact me via email below.
            </p>
            <p> Email: mahal4@mail.fresnostate.edu </p>
          </div>
          <div >
</br>
            <div> <p> Mingzan Liu </p> 
            <p> Description: 
            </p>
            <p> Email: mingzanliu@mail.fresnostate.edu </p>
          </div>
          <button id="closeContact">X</button>
          </div>
        </div>
      </section>

      <section id="leaderboardSection">

        <div id="outterLeaderBoardContainer">
          <div id="innerLeaderBoardContainer">
            <div id="titleLB" >Leaderboard
            </div>
            <div class="theadRow">
              <div id="usernameLB"class="thead"> Username</div> 
              <div id="winsLB" class="thead"> Wins</div> 
              <div id="lossesLB" class="thead"> Losses</div> 
              <div id="gamesplayedLB" class="thead">GP</div> 
              <div id="timeplayedLB" class="thead">TP</div> 
            </div>
          </div>
            <button class="button" id="outterLeaderBoardContainerButton">X</button>
          </div>      

      </section>
    </section>
    <section>
      <div id="modalLB">
        <div id="LBContainer">
          <div id="leaderboard">
            <div id="playerWins"></div>
            <div id="timePlayed"></div>
            <div id="newGameDiv">
              <button id="newGame" class="buttons">New Game</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="startButton">
      <div id="startContainer">
        <button class="buttons" id="start">Start</button>
      </div>
    </section>
    <section id="gameSection">
      <div id="outterTableContainer">
        <div>
        <div id="playerInformationContainer">
          <div id="playerInformation">Player 1 turn</div>
          <div id="turn">Current Turn:</div>

          <div class="container">
            <div id="timer">00:00</div>
          </div>
        </div>

        <div id="innerTableContainer" class="boardColor"></div>
        </div>
      </div>
    </section>
    <section id="usergamesSection">
        <div id="outterusergamesContainer">
        <div id="titleUB" >User game history </div>
          <div id="innerusergamesContainer">
            <div class="theadRow">
              <div id="gamesUG"class="thead"> gamesID</div> 
              <div id="resultUG" class="thead"> Result</div> 
              <div id="timeplayedUG" class="thead">TP</div> 
            </div>
          </div>
            <button class="button" id="outterusergamesContainerButton">X</button>
          </div>      

      </section>
    <script src="../script.js"></script>
  </body>
</html>
