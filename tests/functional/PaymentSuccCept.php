<?php
$I = new TestGuy($scenario);
$I->wantTo('Compra exitosa del libro GOT');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('Card Number', '4000000000000044');
$I->fillField('Expiry Date','1016');
$I->fillField('Security Code','123');
$I->fillField('Id User','12584345');
$I->selectOption('Tipo', 'visa');
$I->selectOption('Banco Emisor', 'provincial');
$I->click('Validar');
$I->see('Compra Exitosa');
