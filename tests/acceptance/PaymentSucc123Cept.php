<?php
$I = new WebGuy($scenario);
$I->wantTo('Compra exitosa del libro GOT');
$I->amOnPage('index.php?r=site/login');
//$I->fillField('Username ', 'natalya@correo.com');
//$I->fillField('Password ','123456');
$I->submitForm('#login-form', array('username' => 'natalya@correo.com', 'password' => '123456'));
$I->click('Compra');
$I->amOnPage('index.php?r=site/inicio');
$I->click('Comprar');
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->fillField('Card Number', '4000000000000044');
$I->fillField('Expiry Date','1016');
$I->fillField('Security Code','256');
$I->fillField('Id User','TEST');
$I->selectOption('Tipo', 'Visa');
$I->selectOption('Banco Emisor', 'Provincial');
$I->click('Validar');

$I->amOnPage('index.php?r=site/validate');
//$I->seeInCurrentUrl('validate');
$I->see('Compra Exitosa');