<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock-Paper-Scissors</title>
</head>
<body>

<div id="header">
<h1>Automatic Rock-Paper-Scissors Game</h1>
</div>

<div id="game">

<form action="index.php" method="post">
    <input type="submit" name="StartGame" value="Start Game" />
    <input type="submit" onClick="window.location.href=window.location.href" value="Restart"/>

</form>

<?php
    //0 is rock, 1 is paper, 2 is scissors
    $round = 1;
    $Aplay = 0;
    $Bplay = 0;
    $Awins = 0;
    $Bwins = 0;
    $draws = 0;
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['StartGame']))
    {
        start();
    }

function Aplay(){
    $GLOBALS["Aplay"] = rand(0,2);
}

function Bplay(){
    $GLOBALS["Bplay"] = rand(0,2);
}

function PlayPrint($play){
    switch ($play) {
        case 0:
            return "Rock";
            break;
        case 1:
            return "Paper";
            break;
        case 2:
            return "Scissors";
            break;
        default:
            break;
    } 
}

function PlayCalculate($A,$B){

    if($A == $B){
    $GLOBALS["draws"]++;
    return "Same Choice: It's a Draw";
    }

   if ($A == 0 && $B == 1) {
    $GLOBALS["Bwins"]++;
       return "Paper Covers Rocks: Player B Wins";
   }
   if ($A == 0 && $B == 2) {
    $GLOBALS["Awins"]++;
    return "Rock Crushes Scissors: Player A Wins";
   }
   if ($A == 1 && $B == 0) {
    $GLOBALS["Awins"]++;
    return "Paper Covers Rocks: Player A Wins";
   }
   if ($A == 1 && $B == 2) {
    $GLOBALS["Bwins"]++;
    return "Scissors Cuts Paper: Player B Wins";
   }  
   if ($A == 2 && $B == 0) {
    $GLOBALS["Bwins"]++;
    return "Rock Crushes Scissors: Player B wins";
   }
   if ($A == 2 && $B == 1) {
    $GLOBALS["Awins"]++;
    return "Scissors Cuts Paper: Player A Wins";
   }
}

function start(){
    echo  "<h4>The game has begun!</h4>";
    for($i=0;$i<10;$i++){
    Aplay();
    BPlay(); 
    echo "<p id="."round".">Round ".$GLOBALS["round"]."</p>";
    //echo "<h3 id="."PlayerA".">Player A</h3>";
    //echo "<h3 id="."PlayerB".">Player B</h3>";
    echo "<div class="."row".">";
    echo "<div class="."column"." style="."background:url(crosshatch2.jpg);>";
    echo "<h2>Player A</h2>";
    echo "<p id="."play".">".PlayPrint($GLOBALS["Aplay"])."</p>";
    echo "</div>";
    echo "<div class="."column"." style="."background-color:#ffffff>";
    echo "<h2></h2>";
    echo "<p id= "."res".">".PlayCalculate($GLOBALS["Aplay"],$GLOBALS["Bplay"])."</p>";
    echo "</div>";
    echo "<div class="."column"." style="."background:url(crosshatch2.jpg);>";
    echo "<h2>Player B</h2>";
    echo "<p id="."play".">".PlayPrint($GLOBALS["Bplay"])."</p>";
    echo "</div>";
    echo "</div>";
    //sleep(1);
    $GLOBALS["round"]++;
    //echo "<script>console.log('Debug Objects: " . 1 . "' );</script>";  
    } 
    echo "<div>";   
    echo "<h2>Summary:</h2>";
    echo "<ul>";
    echo "<li>Player A has won ".$GLOBALS["Awins"]." times.</li>";
    echo "</br>";
    echo "<li>Player B has won ".$GLOBALS["Bwins"]." times.</li>";
    echo "</br>";
    echo "<li>Total of ".$GLOBALS["draws"]." draws.</li>";
    echo "</ul>";
    echo "</div>";
    echo "<p style="."font-size:25px;".">Coded by Buğra Meriç Değirmenci 2021</p>" ; 
}  

?>

</div>

</body>
</html>

<style>
*{
font-family:Arial, Helvetica, sans-serif, 'Times New Roman', Times, serif, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
box-sizing: border-box;
}

body{
    background-image:url(rps.jpg);
    background-repeat: repeat;
    background-size: 30%;
    size:50%;
}

.column {
  float: left;
  width: 33.33%;
  height: 400px;
  border: solid 5px black;
  border-radius: 15px;
}

.column p{
    justify-content: center;
    align-items: center;
    text-align: center;
}

#play{
    font-size: 85px;
    font-weight: 600;
    color:white;
    -webkit-text-stroke-width: 3px;
    -webkit-text-stroke-color:black;
}

#res{
    padding-top:28%;
    font-size:35px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

#header{
text-align: center;
justify-content: center;
margin:auto;
margin-top: 25px;
width: 30%;
}

#header h1{
    color: black;
    height: 100px;
    background-color:#ffffff;
    padding-top: 2%;
    border-radius: 15px;
    border: solid 5px black;
}

#game input{
background-color: black;
color:white;
border-radius: 15px;
height: 40px;
width: 150px;
font-size: 20px;
font-family: Arial, Helvetica, sans-serif;
border: 0 none;
}

#game input:focus{
    outline: none;
    background-color: white;
    color:black
}
#game input:hover{
    outline: black;
    border:solid 3px black;
    background-color: white;
    color:black;
    transition: 0.25s;
}
#game input:active{
    outline: none;
    background-color: white;
}

#game h2{
    color: white;
    font-size: 35px;
    font-weight: 600;
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color:black;
    background-color:rgba(255,255,255,0.7);
}

h4{
    font-size: 25px;
}

#game{
    text-align: center;
    padding:2%;
    margin-top: 3%;
    border:solid #1f2935 5px;
    border-radius: 15px;
    margin:auto;
    width: 80%;
    background-color: rgba(255,255,255,0.9);
}

#round{
    font-size:30px;
    font-weight: 600;
}

ul{ 
    list-style-type: none;
    margin-right: 40px;
}
li{
    
    font-size: 20px;
    margin: auto;
}

</style>