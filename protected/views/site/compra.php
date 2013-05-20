<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Juego de Tronos - George R. R. Martin</p>

<p></p>
<ul>
	<li><b><i>Cancion de Hielo y Fuego 1 </i></b></li>
	
</ul>
<img src="themes/mattskitchen/img/got.jpg" alt="GOT" height="42" width="42" class="image"></img>
<br>
<br>

<p>Datos de Compra</p>
<form method="post" action="/validate" id="payment_form">
     <label for="card_number">Card Number</label>
     <input type="text" name="card[number]" id="card_number" /><br>
     <label for="card_expiry">Expiry Date</label>
     <input type="text" name="card[expiry]" id="card_expiry" /><br>
     <label for="card_security">Security Code</label>
     <input type="text" name="card[security]" id="card_security" /><br>
     <label for="card_id">Id User</label>
     <input type="text" name="card[id]" id="card_id" /><br>
     <label for="user_gender">Tipo</label>
     <select id="user_gender" name="user[gender]">
          <option value="v">Visa</option>
          <option value="m">Master</option>
     </select>     
     <br>
     <input type="submit" value="Validar" />
</form>