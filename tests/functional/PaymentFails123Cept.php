<?php
$I = new TestGuy($scenario);
$I->wantTo('Realizar Pago pero el Banco Rechaza Tarjeta');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('Card Number', '4563000004');
$I->fillField('Expiry Date','1016');
$I->fillField('Security Code','12345');
$I->fillField('Id User','12584345');
$I->selectOption('Tipo', 'visa');
$I->selectOption('Banco Emisor', 'banesco');
$I->click('Validar');
$I->see('Tarjeta Negada por el Banco');

