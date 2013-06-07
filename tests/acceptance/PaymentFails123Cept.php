<?php
$I = new WebGuy($scenario);
$I->wantTo('Realizar Pago pero el Banco Rechaza Tarjeta 123pago');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('form[card_number]', '4050606060303303030');
$I->fillField('form[card_expiry]','1016');
$I->fillField('form[card_security]','123');
$I->fillField('form[user_id]','TEST');
$I->selectOption('form[card_type]', 'Visa');
$I->selectOption('form[card_bank]', 'Banesco');
$I->click('Validar');
$I->see('Tarjeta Negada por el Banco');