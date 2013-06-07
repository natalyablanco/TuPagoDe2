<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
echo Yii::app()->user->id;
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script>

function loading(){
  $('.loading').fadeIn('fast');
  
}
 
</script>

<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Juego de Tronos - George R. R. Martin</p>

<p></p>
<ul>
	<li><b><i>Cancion de Hielo y Fuego 1 </i></b></li>
	
</ul>
<img src="themes/mattskitchen/img/got.jpg" alt="GOT" height="42" width="42" class="image"></img>
<br>
<br>

<h1>Datos de Compra</h1>
<form method="post" action="index.php?r=site/validate" id="payment_form">
     <label for="amount">Amount</label>
     <input type="text" name="form[amount]" id="amount" value="500" disabled/><br>
     <input type="hidden" name="form[amount]" id="amount" value="500" />

     <label for="merchant_usn">Merchant USN</label>
     <input type="text" name="form[merchant_usn]" id="merchant_usn" value="19949576" disabled/><br>
     <input type="hidden" name="form[merchant_usn]" id="merchant_usn" value="19949576" />

     <label for="merchant_id">Merchant Id</label>
     <input type="text" name="form[merchant_id]" id="merchant_id" value="TESTSTORE" disabled/><br>
     <input type="hidden" name="form[merchant_id]" id="merchant_id" value="TESTSTORE"/>

     <label for="order_id">Order Id</label>
     <input type="text" name="form[order_id]" id="order_id" value="19949576" disabled/><br>
     <input type="hidden" name="form[order_id]" id="order_id" value="19949576" />
     
     <label for="card_number">Card Number</label>
     <input type="text" name="form[card_number]" id="card_number" value="" maxlength="19"/><br>
     
     <label for="card_expiry">Expiry Date</label>
     <input type="text" name="form[card_expiry]" id="card_expiry" value="" maxlength="4"/><br>
     
     <label for="card_security">Security Code</label>
     <input type="text" name="form[card_security]" id="card_security" value="" maxlength="5"/><br>
     
     <label for="card_id">Id User</label>
     <input type="text" name="form[user_id]" id="card_id" maxlength="8" value=""/><br>
     
     <label for="card_type">Tipo</label>
     <select id="card_type" name="form[card_type]">
          <option value="visa">Visa</option>
          <option value="mastercard" >Master Card</option>
          <option value="amex">American Express</option>
          <option value="diners">Diners</option>
          <option value="hipercard">Hipercard</option>
     </select> 
     <br>
     <label for="card_bank">Banco Emisor</label>
     <select id="card_bank" name="form[card_bank]">
          <option value="banesco">Banesco</option>
          <option value="provincial" >Provincial</option>
     </select>     

     <br>
     <input type="submit" value="Validar" id="click" onClick="javascript: loading();"  />
</form>
<br>
<img class="loading" src="themes/mattskitchen/img/loader.gif"  alt="loading" style="display:none"></img>
