<?php
$I = new TestGuy($scenario);
$I->wantTo('No poder realizar transaccion si hay campos vacios');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('Card Number', '');
$I->fillField('Expiry Date','1016');
$I->fillField('Security Code','256');
$I->fillField('Id User','TEST');
$I->selectOption('Tipo', 'visa');
$I->selectOption('Banco Emisor', 'provincial');
$I->click('Validar');
$I->see('No puede dejar campos vacios');

