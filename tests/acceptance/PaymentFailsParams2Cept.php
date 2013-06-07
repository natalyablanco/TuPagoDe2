<?php
$I = new WebGuy($scenario);
$I->wantTo('Falla pagar libro por error en datos de la tarjeta');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('form[card_number]', '4563470000000000004');
$I->fillField('form[card_expiry]','1016');
$I->fillField('form[card_security]','12345');
$I->fillField('form[user_id]','12584345');
$I->selectOption('form[card_type]', 'Master Card');
$I->selectOption('form[card_bank]', 'Provincial');
$I->click('Validar');
$I->see('Numero de Tarjeta Errado - Prefijo no concuerda con tipo de tarjeta');