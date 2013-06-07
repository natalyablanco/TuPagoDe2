<?php
$I = new WebGuy($scenario);
$I->wantTo('Realizar Pago pero el Banco Rechaza Tarjeta');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('form[card_number]', '5555555555555555');
$I->fillField('form[card_expiry]','1016');
$I->fillField('form[card_security]','555');
$I->fillField('form[user_id]','TEST');
$I->selectOption('form[card_type]', 'Master Card');
$I->selectOption('form[card_bank]', 'Provincial');
$I->click('Validar');
$I->see('Tarjeta Negada por el Banco');