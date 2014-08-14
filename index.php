<!doctype html><html><head><meta charset="utf-8">
<title>AJAX SIMPLE MAIL PHP</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">
$(function(){
var mail_valid=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,phone_valid=/^[0-9-+()]+$/; $(".bmail_form").submit(function(){var b=$(this);$(".bmail_form *",b).removeClass("b_err");var a=0;$(".b_req",b).each(function(){if(!$(this).val()||$(this).hasClass("b_mail")&&!mail_valid.test($(this).val().toLowerCase())||$(this).hasClass("b_phone")&&!phone_valid.test($(this).val().toLowerCase()))a+=1,$(this).addClass("b_err")});if(0<a)return!1;$.ajax({type:"POST",url:"/mail.php",data:$(this).serialize()+"&to="+$(this).attr("data-to"),success:function(a){"1"==a?($(b).trigger("reset"),$("input[type=submit]", b).after('<div style="font-size:11px;color:#090;font-weight:700;text-shadow:1px 1px 0 #dadada">Your message was sent successfully</div>').remove()):alert("Error")}});return!1});$("body").on("mouseover","input.b_err",function(){$(this).removeClass("b_err")});$("body").append("<style>.b_err{border-color:#f00 !important;-moz-box-shadow:inset 0 0 0 2px #ea1313 !important;-webkit-box-shadow:inset 0 0 0 2px #ea1313 !important;box-shadow:inset 0 0 0 2px #ea1313 !important}</style>");});
</script>

<form data-to="roman@belugalab.com" class="bmail_form" action="" method="post">
	<input type="text" value="" id="name" name="Name" class="field b_req">
    <input type="text" value="" id="phone" name="Phone" class="field b_phone">
    <input type="text" value="" id="mail" name="E-Mail" class="field b_req b_mail">
    <textarea id="message" name="Message" class="b_req"></textarea>            
	<input type="submit" value="Submit now">
</form>	 

<?php
/*
data-to             - куда отправлять письмо
класс b_req         - обязательние поля
класс b_mail        - клас для валидации емейла в етом поле
класс b_phone       - клас для валидации номера телефона в етом поле
mail.php            - должен быть в корене сайта, либо поменять путь в запросе AJAX  .js
*/
?>
</body>
</html>