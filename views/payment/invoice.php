<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "E-SHOPPER | Robokassa";
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'сумки описание',//$category->keywords if in db has field description
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'сумки ключевики',//$category->description if in db has field keywords
]);
?>

<section>
    <div class="container">
        <div class="row">
            <!--<h1>Контрольная сумма для Robokassa</h1>-->
            <?php
            // your registration data
            $mrh_login = "...";      // your login in Robokassa
            $mrh_pass1 = "...";   // merchant pass1 in Robokassa

            // order properties
            $inv_id = 0;        // shop's invoice number
            // (unique for shop's lifetime)
            $inv_desc = "desc";   // invoice desc
            $out_summ = "5.12";   // invoice summ

            //Дополнительный параметр
            $shpa = 1;//example product id
            $shpb = "user@gmail.com";

            // build CRC value
            $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:shpa=$shpa:shpb=$shpb");

           // echo "<p>$crc</p>";

            ?>

            <form action="http://test.robokassa.ru/Index.aspx" method="post"><!--default get and link for really https://auth.robokassa.ru/Merchant/Index.aspx-->
                <input type="hidden" name="MrchLogin" value="<?php echo $mrh_login; ?>">
                <input type="hidden" name="OutSum" value="<?php echo $out_summ; ?>">
                <input type="hidden" name="InvId" value="<?php echo $inv_id; ?>">
                <input type="hidden" name="Desc" value="<?php echo $inv_desc; ?>">
                <input type="hidden" name="IncCurrLabel" value="WMZM">
                <input type="hidden" name="Culture" value="ru">
                <input type="hidden" name="Encoding" value="utf-8">
                <input type="hidden" name="shpa" value="<?php echo $shpa; ?>"><!--if not required field will start shp-->
                <input type="hidden" name="shpb" value="<?php echo $mrh_login; ?>">
                <input type="hidden" name="SignatureValue" value="<?php echo $crc;?>"><!--Контрольная сумма для Robokassa-->
                <input type="submit" value="Купить">
            </form>
            <br/><br/>
        </div>
    </div>
</section>