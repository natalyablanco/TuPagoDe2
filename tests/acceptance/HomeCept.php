<?php
$I = new WebGuy($scenario);
$I->wantTo('see a book that I want to buy');
$I->amOnPage('index.php?r=site/inicio');
$I->see('Juego de Tronos - George R. R. Martin');
$I->seeElement('.image');
$I->click('Comprar');
$I->amOnPage('index.php?r=site/compra');
$I->see('Datos de Compra');
?>


