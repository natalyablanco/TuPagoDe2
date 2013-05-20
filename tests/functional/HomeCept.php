<?php
$I = new TestGuy($scenario);
$I->wantTo('see a book of got and click "comprar" to see a order form ');
$I->amOnPage('/');
$I->see('Juego de Tronos - George R. R. Martin','p');
$I->seeElement('.image');
$I->seeLink('Comprar');
$I->click('Comprar');
$I->amOnPage('/site/compra');
$I->see('Juego de Tronos - George R. R. Martin','p');
$I->see('Cancion de Hielo y Fuego 1');

?>

