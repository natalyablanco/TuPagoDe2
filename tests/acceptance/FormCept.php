<?php

$I = new WebGuy($scenario);
$I->wantTo('See a payment form');
$I->amOnPage('/');
$I->see('Juego de tronos');
$I->see('Comprar');
$I->click('Comprar');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('card[number]', '4563470000000000004');
$I->fillField('card[expiry]','1016');
$I->fillField('card[security]','12345');
$I->fillField('card[id]','12584345');
$I->click('Validar');
