<?php
session_start();
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Help Desk</title>
    <link rel="stylesheet" href="main.css" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="jquery-1.11.2.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(e){
            //ajax başlatılıyor
            //sayfa il açıldığına mesajları almak için
            var sayac=$('#sayac').val();
            $.ajax({
                url:'sohbet.php',
                type:'POST',
                //data:{"mail":mail,"sifre":sifre},
                data:{"sayac":sayac},
                success:function(cevap){
                    if(cevap.durum == true){
                        alert(cevap.veri);
                        $.each(cevap.veri, function( k, v ) {

                           $("#mesaj").append("<p>"+v["mesaj"]+"</p>");
                        });
                    }else{
                        alert( cevap.aciklama);
                    }

                }
            });
            //sayfa ilk açıldığında mesajları almak için -----
            $('#btnKayit').click(function(){
                var email=$('[name=email]').val().trim();
                var adi=$('[name=adi]').val().trim();
                var sikinti=$('[name=sikinti]').val().trim();

                if(email==""){
                    alert("Lütfen Mail Adresi Giriniz");
                    $('[name=email]').focus();
                }
                else if(adi==""){
                    alert("Lütfen Adınızı Giriniz");
                    $('[name=adi]').focus();
                }

                else if(sikinti==""){
                    alert("Lütfen Sorunuzu Giriniz");
                    $('[name=sikinti]').focus();
                }
                else{
                    //data bilgileri var ajax başlayabilir
                    $.ajax({
                        url:'sohbet.php',
                        type:'POST',
                        //data:{"mail":mail,"sifre":sifre},
                        data:$('#form').serialize(),
                        success:function(cevap){

                            if(cevap.durum==true){
                                $("#sohbetFrame").css({
                                    visibility:"visible"

                                });
                            }
                        }
                    });
                }

            });
            $('#btnClear').click(function(){
                $('[name=adi]').val('');
                $('[name=email]').val('');
                $('[name=sikinti]').val('');
            });
            $('#btnGonder').click(function(){
                var mesaj=$('[name=mesaj]').val().trim();
                if(mesaj !=""){
                    $.ajax({
                        url:'sohbet.php',
                        type:'POST',
                        //data:{"mail":mail,"sifre":sifre},
                        data:$('#formMesaj').serialize(),
                        success:function(cevap){

                            if(cevap.durum==true){
                                $("#sohbetFrame").css({
                                    visibility:"visible"

                                });
                                $('[name=mesaj]').val('');
                            }
                        }
                    });
                }
            });

            setInterval(function(){
                $.ajax({
                    url:'sohbet.php',
                    type:'POST',
                    //data:{"mail":mail,"sifre":sifre},
                    ddata:{"sayac":sayac},
                    success:function(cevap){

                        if(cevap.durum == true){

                            $.each(cevap.veri, function( k, v ) {
                                $("#mesaj").append("<p>"+v["mail"]+"<br>"+ v["mesaj"]+"</p>");
                                alert(v["mail"]);
                            });
                            alert(i);
                            $("#sayac").val(i);
                        }
                    }
                });
            },5000)

        });

    </script>
</head>
<body>
<div style="margin:10px auto; width:700px;">
    <div class="row col-md-4">
        <form id="form" >
            <input type="email" name="email" placeholder="Email adresiniz"><br>
            <input type="text" name="adi" placeholder="Adınız"><br>
            <input type="text" name="sikinti" placeholder="Sorunuz"><br>
            <input type="button" name="kayit" id="btnClear" class="btn btn-primary" value="Temizle"/>
            <input type="button" name="kayit" id="btnKayit" class="btn btn-primary" value="Kaydet"/>
        </form>
    </div>
</div>
<div id="sohbetFrame">
<div id="sohbet">
    <div id="isim">
        <?php
        echo $_SESSION["email"];
        ?>
    </div>
    <div id="mesaj">

    </div>
</div>
    <div id="input">
        <form id="formMesaj">
        <input type="text" name="mesaj" id="txtMesaj"><br><br>
        <input type="button" name="btnMesaj" id="btnGonder" class="btn btn-primary" value="Gönder">
        </form>
    </div>

</div>
<input type="hidden" name="sayac" value="0" id="sayac">

</body>
</html>