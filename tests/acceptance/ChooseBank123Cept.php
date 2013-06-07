<?php
$I = new WebGuy($scenario);
$I->wantTo('Escoger Banesco como el banco emisor de la tarjeta para comprar el libro de GOT');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('form[card_number]', '4563470000000000004');
$I->fillField('form[card_expiry]','1016');
$I->fillField('form[card_security]','12345');
$I->fillField('form[user_id]','12584345');
$I->selectOption('form[card_type]', 'Visa');
$I->selectOption('form[card_bank]', 'Banesco');
$I->click('Validar');
$I->amOnPage('index.php?r=site/validate');

