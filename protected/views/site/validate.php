<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Juego de Tronos - George R. R. Martin</p>

<p></p>
<ul>
	<li><b><i>COMPRAR Cancion de Hielo y Fuego 1 </i></b></li>
	
</ul>
<img src="themes/mattskitchen/img/got.jpg" alt="GOT" height="42" width="42" class="image"></img>
<br>
<br>
<?php 
     if($validate == "false_expiry"){
          $err = "Fecha Errada";
     }elseif($validate == "false_security"){
           $err = "Codigo de Seguridad Errado";
     }elseif($validate == "false_number"){
          $err = "Numero de Tarjeta Errado";
     }else{
          $err = "Compra Exitosa";
     };
 ?>
<p><b> <?php 
     //print_r($_POST);
     echo $err; 
?> </b></p>

<h1>Datos de Compra</h1>
<form method="post" action="site/validate" id="payment_form">
     <label for="amount">Amount</label>
     <input type="text" name="form[amount]" id="amount" value="500" disabled/><br>

     <label for="merchant_usn">Merchant USN</label>
     <input type="text" name="form[merchant_usn]" id="merchant_usn" value="19949576" disabled/><br>
     
     <label for="merchant_id">Merchant Id</label>
     <input type="text" name="form[merchant_id]" id="merchant_id" value="TESTSTORE" disabled/><br>
     
     <label for="order_id">Order Id</label>
     <input type="text" name="form[order_id]" id="order_id" value="19949576" disabled/><br>
     
     <label for="card_number">Card Number</label>
     <input type="text" name="form[card_number]" id="card_number" disabled/><br>
     
     <label for="card_expiry">Expiry Date</label>
     <input type="text" name="form[card_expiry]" id="card_expiry" disabled/><br>
     
     <label for="card_security">Security Code</label>
     <input type="text" name="form[card_security]" id="card_security" disabled/><br>
     
     <label for="card_id">Id User</label>
     <input type="text" name="form[user_id]" id="card_id" disabled /><br>
     
     <label for="card_type">Tipo</label>
     <select id="card_type" name="form[card_type]">
          <option value="visa">Visa</option>
          <option value="mastercard">Master Card</option>
          <option value="amex">American Express</option>
          <option value="diners">Diners</option>
          <option value="hipercard">Hipercard</option>
     </select>     
     <br>
     <input type="submit" value="Validar" />
</form>