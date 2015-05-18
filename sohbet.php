<?php
session_start();
header("Content-type:application/json;charset=utf8");
require_once 'main.php';
$json =array(
    "durum" => false,
    "session" => false,
    "kayit" => false,
    "aciklama" => "veriler gelmedi",
);
if(isset($_POST["email"]) && isset($_POST["adi"]) && isset($_POST["sikinti"]) && !empty($_POST["email"]) &&!empty($_POST["adi"]) &&!empty($_POST["sikinti"])) {
    $sonuc = main::kayitAc($_POST["adi"], $_POST["email"], $_POST["sikinti"]);
    if($sonuc !=false){
        $_SESSION["ad"]=$_POST["adi"];
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["sikinti"]=$_POST["sikinti"];
        $_SESSION["baslikId"] = $sonuc;
        $json["aciklama"]="Kayıt Yapıldı";
        $json["session"]=true;
        $json["durum"]=true;
    }
    else{
        $json["aciklama"]="Kayıt Yapılamadı";
    }

}

if( isset($_POST["mesaj"]) && !empty($_POST["mesaj"])){
 $sonuc=main::mesajKaydet($_SESSION["baslikId"],$_SESSION["email"],$_POST["mesaj"],2);
    if($sonuc){
        $json["aciklama"]="Kayıt Yapıldı";
        $json["session"]=true;
        $json["durum"]=true;
    }else{
        $json["aciklama"]="Kayit Yapılamadı";
    }
}

if(isset($_POST["sayac"])){
$sonuc=main::mesajGetir($_SESSION["baslikId"],$_POST["sayac"]);
    if($sonuc !=false){
        $json["aciklama"]="Veriler Alındı";
        $json["session"]=true;
        $json["durum"]=true;
        $json["veri"]=$sonuc;
    }
    else{
        $json["aciklama"]="Yeni Mesaj Yok";
    }
}


echo json_encode($json);
?>