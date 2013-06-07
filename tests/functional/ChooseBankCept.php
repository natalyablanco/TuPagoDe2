<?php
$I = new TestGuy($scenario);
$I->wantTo('Escoger Banesco como el banco emisor de la tarjeta para comprar el libro de GOT');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('Card Number', '4563470000000000004');
$I->fillField('Expiry Date','1016');
$I->fillField('Security Code','12345');
$I->fillField('Id User','12584345');
$I->selectOption('Tipo', 'visa');
$I->selectOption('Banco Emisor', 'provincial');
$I->click('Validar');
$I->amOnPage('index.php?r=site/validate');
