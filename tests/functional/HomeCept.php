<?php
$I = new TestGuy($scenario);
$I->wantTo('see a book of got and click "comprar"');
$I->amOnPage('index?r=site/inicio');
$I->see('Juego de Tronos - George R. R. Martin');
$I->seeElement('.image');
$I->seeLink('Compra');
$I->click('Compra');
$I->amOnPage('/site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
?>

