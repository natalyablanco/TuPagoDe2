<?php
$I = new WebGuy($scenario);
$I->wantTo('Compra exitosa del libro GOT');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('form[card_number]', '4000000000000044');
$I->fillField('form[card_expiry]','1016');
$I->fillField('form[card_security]','256');
$I->fillField('form[user_id]','TEST');
$I->selectOption('form[card_type]', 'Visa');
$I->selectOption('form[card_bank]', 'Provincial');
$I->click('Validar');
$I->see('Compra Exitosa');