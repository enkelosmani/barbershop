<?php
session_start();
$dbconn="";
dbConnection();
function dbConnection(){
    global $dbconn;
    $dbconn=mysqli_connect("localhost",'root','','barbershop2');
    if(!$dbconn){
        die("Deshtoi lidhja me DB".mysqli_error($dbconn));
    }
}

dbConnection();
if(isset($_GET['argument'])){
    if($_GET['argument']=='dalja'){
        session_destroy();
        echo "index.php" ;
    }else if($_GET['argument']='mesazhi'){
        unset($_SESSION['mesazhi']);
    }
}


function login($email,$fjalekalimi){
    global $dbconn;
    $sql=" SELECT * FROM berberat WHERE email='$email' AND fjalekalimi='$fjalekalimi' ";
    $res=mysqli_query($dbconn,$sql);
    if(mysqli_num_rows($res)==1){
        $berberiData=mysqli_fetch_assoc($res);
        $berberi=array();
        $berberi['berberiid']=$berberiData['berberiid'];
        $berberi['emrimbiemri']=$berberiData['emri'] . " " . $berberiData['mbiemri'];
        $berberi['roli']=$berberiData['roli'];
        $_SESSION['berberi']=$berberi;
        header("Location: sherbimet.php");
        print_r($berberiData);
    }else{
        echo "Nuk ka Berber me keso informata";
    }
}
/** Funksionet per klientet */
function merrKlientet(){
    global $dbconn;
    $sql="SELECT klientiid, emri, mbiemri, email, telefoni FROM klientet";
    return mysqli_query($dbconn,$sql);
}
function merrKlientId($kid){
    global $dbconn;
    $sql="SELECT klientiid, emri, mbiemri, email, telefoni FROM klientet";
    $sql.=" WHERE klientiid=$kid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoKlient($emri,$mbiemri,$telefoni,$email){
    global $dbconn;
    $sql="INSERT INTO klientet(emri, mbiemri, email,telefoni) VALUES ('$emri', '$mbiemri', '$email', '$telefoni')";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi1']="Klienti u shtua me sukses";
        header("Location: klientet.php");
    }else{
        die("Deshtoi shtimi i Klientit" . mysqli_error($dbconn));
    }
}
function modifikoKlient($klientiid,$emri,$mbiemri,$telefoni,$email){
    global $dbconn;
    $sql="UPDATE klientet SET emri='$emri', mbiemri='$mbiemri', email='$email' ,";
    $sql.=" telefoni='$telefoni'";
    $sql.=" WHERE klientiid=$klientiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi1']="Klienti u modifokua me sukses";
        header("Location: klientet.php");
    }else{
        die("Deshtoi modifikimi i Klientit" . mysqli_error($dbconn));
    }
}

function fshijKlient($klientiid){
    global $dbconn;
    $sql="DELETE FROM klientet WHERE klientiid=$klientiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi1']="Klienti u fshi me sukses";
        header("Location: klientet.php");
    }else{
        die("Deshtoi fshirja e klientit" . mysqli_error($dbconn));
    }
}
/** */
/** Funksionet per stilet */
function merrStilet(){
    global $dbconn;
    $sql="SELECT s.stiliid, sh.emri  AS emrisherbimit,s.emri";
    $sql.=" FROM stilet s INNER JOIN sherbimet sh  ON sh.sherbimiid=s.sherbimiid";
    $sql.=" ORDER BY s.stiliid DESC";
    return mysqli_query($dbconn,$sql);
}
function merrStiliId($sid){
    global $dbconn;
    $sql="SELECT * FROM stilet WHERE stiliid=$sid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res); 
}
function shtoStil($emri,$sherbimiid){
    global $dbconn;
    $sql="INSERT INTO stilet(emri,sherbimiid) VALUES ('$emri', $sherbimiid)";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi2']="Stili u shtua me sukses";
        header("Location: stilet.php");
    }else{
        die("Deshtoi shtimi i Stilit" . mysqli_error($dbconn));
    }
}
function modifikoStil($stiliid,$emri){
    global $dbconn;
    $sql="UPDATE stilet  SET emri='$emri'";
    $sql.=" WHERE stiliid=$stiliid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi2']="Stili u modifiku me sukses";
        header("Location: stilet.php");
    }else{
        die("Deshtoi modifikimi i stilit" . mysqli_error($dbconn));
    }
}
function fshijStil($stiliid){
    global $dbconn;
    $sql="DELETE FROM stilet WHERE stiliid=$stiliid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi2']="Stili u fshi me sukses";
        header("Location: stilet.php");
    }else{
        die("Deshtoi fshirja e stilit" . mysqli_error($dbconn));
    }
}

/** */
/** Funksionet per sherbimet */
function merrSherbimet(){
    global $dbconn;
    $sql="SELECT * FROM sherbimet";
    return mysqli_query($dbconn,$sql); 
}
function merrSherbimiId($shid){
    global $dbconn;
    $sql="SELECT * FROM sherbimet WHERE sherbimiid=$shid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res); 
}
function shtoSherbim($emri,$kostoja){
    global $dbconn;
    $sql="INSERT INTO sherbimet(emri,kostoja) VALUES ('$emri', $kostoja)";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi3']="Sherbimi u shtua me sukses";
        header("Location: sherbimet.php");
    }else{
        die("Deshtoi shtimi i Sherbimit" . mysqli_error($dbconn));
    }
}
function modifikoSherbim($sherbimiid,$emri,$kostoja){
    global $dbconn;
    $sql="UPDATE sherbimet  SET emri='$emri', kostoja='$kostoja'";
    $sql.=" WHERE sherbimiid=$sherbimiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi3']="Sherbimi u modifiku me sukses";
        header("Location: sherbimet.php");
    }else{
        die("Deshtoi modifikimi i sherbimit" . mysqli_error($dbconn));
    }
}
function fshijSherbim($sherbimiid){
    global $dbconn;
    $sql="DELETE FROM sherbimet WHERE sherbimiid=$sherbimiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi3']="Sherbimi u fshi me sukses";
        header("Location: sherbimet.php");
    }else{
        die("Deshtoi fshirja e Sherbimit" . mysqli_error($dbconn));
    }
}
/** */
/** Funksionet per rezervimet */
function merrRezervimet(){
    global $dbconn;
    $sql="SELECT r.rezervimiid, sh.emri, CONCAT(k.emri,' ',k.mbiemri) AS emrimbiemri,CONCAT(b.emri,' ',b.mbiemri) AS emriMbiemri ,r.data";
    $sql.=" FROM rezervimet r INNER JOIN sherbimet sh  ON sh.sherbimiid=r.sherbimiid INNER JOIN klientet k ON r.klientiid=k.klientiid INNER JOIN berberat b ON r.berberiid=b.berberiid";
    $sql.=" ORDER BY r.rezervimiid DESC";
    return mysqli_query($dbconn,$sql);
}
function merrRezervimId($rezervimiid){
    global $dbconn;
    $sql="SELECT r.rezervimiid, sh.emri, CONCAT(k.emri,' ',k.mbiemri) AS emrimbiemri,CONCAT(b.emri,' ',b.mbiemri) AS emriMbiemri ,r.data";
    $sql.=" FROM rezervimet r INNER JOIN sherbimet sh  ON sh.sherbimiid=r.sherbimiid INNER JOIN klientet k ON r.klientiid=k.klientiid INNER JOIN berberat b ON r.berberiid=b.berberiid";
    $sql.=" WHERE rezervimiid=$rezervimiid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoRezervim($klientiid, $sherbimiid, $data) {
    global $dbconn;
    $berberiid = $_SESSION['berberi']['berberiid'];
    $sql = "INSERT INTO rezervimet (klientiid, sherbimiid, berberiid, data) VALUES ";
    $sql .= "('$klientiid', '$sherbimiid', '$berberiid', '$data')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['mesazhi4'] = "Rezervimi u shtua me sukses";
        header("Location: rezervimet.php");
    } else {
        die("Deshtoi shtimi i rezervimit" . mysqli_error($dbconn));
    }
}

function modifikoRezervim($rezervimiid,$klientiid,$sherbimiid,$berberiid,$data){
    global $dbconn;
    $berberiid=2;
    $sql="UPDATE rezervimet  SET klientiid='$klientiid', sherbimiid='$sherbimiid', berberiid='$berberiid',";
    $sql.=" data='$data' WHERE rezervimiid='$rezervimiid' ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['mesazhi4']="Rezervimi u modifiku me sukses";
        header("Location: rezervimet.php");
    }else{
        die("Deshtoi modifikimi i rezervimit" . mysqli_error($dbconn));
    }
}
function fshijRezervim($rezervimiid) {
    global $dbconn;
    $sql = "DELETE FROM rezervimet WHERE rezervimiid = $rezervimiid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['mesazhi4'] = "Rezervimi u fshi me sukses";
        header("Location: rezervimet.php");
    } else {
        die("Deshtoi fshirja e rezervimit" . mysqli_error($dbconn));
    }
}


/** */
function merrBerberat(){
    global $dbconn;
    $sql="SELECT * from berberat";
    return mysqli_query($dbconn,$sql);
}
function merrBerberiId($bid){
    global $dbconn;
    $sql="SELECT * FROM berberat WHERE berberiid=$bid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res); 
}