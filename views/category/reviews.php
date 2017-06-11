<?php

use yii\helpers\Html;

$this->title = "E-SHOPPER | Отзывы и предложения";
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
        <div class="row row-content">
            <div class="col-sm-12">
                <h2 class="title text-center">Отзывы и предложения</h2><p><span style="font-size: 14pt; font-family: 'times new roman', times, serif;">Мы будем рады всем Вашим отзывам и предложениям! :)</span></p>
                <div class="comments" style="display:none"><div class="block_header">Комментарии</div></div><br><div class="comments_form">
                    <form method="POST" action="" id="comments" class="ajax" enctype="multipart/form-data">
                        <input type="hidden" name="module" value="comments">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="form_tag" value="comments0">
                        <input type="hidden" name="parent_id" value="0">
                        <input type="hidden" name="element_id" value="21">
                        <input type="hidden" name="module_name" value="site">
                        <input type="hidden" name="element_type" value="element">
                        <input type="hidden" name="tmpcode" value="07a4e20a7bbeeb7a736682b26b16ebe8"><div class="block_header">Оставьте комментарий</div><div class="comments_form_param1"><div class="infofield">Имя<span style="color:red;">*</span>:</div>
                            <input type="text" name="p1" value=""></div><div class="errors error_p1" style="display:none"></div><div style="bgcolor:#ffffff;border:1px;"><textarea name="comment"></textarea></div><div class="errors error" style="display:none"></div><br><div class="captcha"><div class="block captcha">
                                <img src="http://www.familymagperm.ru/captcha/get/comments07731" width="159" height="80" class="code_img captcha-image">
                                <input type="hidden" name="captchaint" value="7731">
                                <input type="hidden" name="captcha_update" value="">

                                <span class="input-title">Введите код с картинки:</span>
                                <input type="text" name="captcha" value="" autocomplete="off">
                                <br>
                                <div class="js_captcha_update captcha_update"><a href="javascript:void(0)" class="button-refresh">&nbsp;</a></div></div><div class="errors error_captcha" style="display:none"></div></div><input type="submit" value="Отправить" class="button solid"><div class="required_field"><span style="color:red;">*</span> — Поля, обязательные для заполнения</div></form>
                </div>
            </div>
        </div>
    </div>
</section>
<br/>
<br/>