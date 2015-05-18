<?php
/**
 * Created by PhpStorm.
 * User: wissen
 * Date: 18.5.2015
 * Time: 09:18
 */


class main
{
    public $DB;

    function __construct()
    {
        $host = "localhost";
        $dbname = "helpDesk";
        $user = "root";
        $pass = "";
        //$dsn = "mysql:host=$host;dbname=$dbname";
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        try {
            $this->DB = new PDO($dsn, $user, $pass);
            //$this->DB->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "[HATA]: Veritabanı -" . $e->getMessage();
        }
    }


    public static
    function kayitAc($ad, $mail, $sikinti)
    {
        $obj = new static();
        $db = $obj->DB;

        $sorgu = $db->prepare("INSERT INTO baslik (id, adi, email,sorun) VALUES (NULL, ?, ?,?)");
        $sorgu->execute(array($ad, $mail,$sikinti));
        if($sorgu->rowCount()>0){
            return $db->lastInsertId();
        }else{
            return false;
        }
    }
    public static
    function mesajKaydet($baslikId, $mail, $mesaj,$tip)
    {
        //$tip 1:admin,2:user
        $obj = new static();
        $db = $obj->DB;

        $sorgu = $db->prepare("INSERT INTO sohbet (id, sohbet_id, mail,mesaj,tip) VALUES (NULL, ?, ?,?,?)");
        $sorgu->execute(array($baslikId, $mail,$mesaj,$tip));
        if($sorgu->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public static
    function mesajGetir($baslikId,$sayac)
    {

        $obj = new static();
        $db = $obj->DB;
        $limit = "limit $sayac,100";
        $sql="select * from sohbet where sohbet_id=? $limit";
        $sorgu = $db->prepare("$sql ");
        $sorgu->execute(array($baslikId));
        if($sorgu->rowCount()>0){
            $sonuc = $sorgu->fetchAll(PDO::FETCH_ASSOC);

            return $sonuc;
        }else{
            return false;
        }
    }
}