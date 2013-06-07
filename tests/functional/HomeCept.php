<?php
$I = new TestGuy($scenario);
$I->wantTo('Ver pagina de inicio con producto y boton de comprar');
$I->amOnPage('index.php?r=site/inicio');
$I->see('Juego de Tronos - George R. R. Martin','p');
$I->seeElement('.image');
$I->click('Comprar');
$I->amOnPage('index.php?r=site/compra');
?>

