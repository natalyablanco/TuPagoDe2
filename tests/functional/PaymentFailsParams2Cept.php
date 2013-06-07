<?php
$I = new TestGuy($scenario);
$I->wantTo('Falla pagar libro por error en datos de la tarjeta');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('Card Number', '4563470000000000004');
$I->fillField('Expiry Date','1016');
$I->fillField('Security Code','12345');
$I->fillField('Id User','12584345');
$I->selectOption('Tipo', 'mastercard');
$I->click('Validar');
$I->amOnPage('index.php?r=site/validate');
$I->see('Numero de Tarjeta Errado - Prefijo no concuerda con tipo de tarjeta');
