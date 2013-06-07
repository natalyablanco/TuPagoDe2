<?php
$I = new WebGuy($scenario);
$I->wantTo('Ver si funciona esto');
$I->amOnPage('index.php?r=site/validate');
$I->see('Juego de Tronos - George R. R. Martin');