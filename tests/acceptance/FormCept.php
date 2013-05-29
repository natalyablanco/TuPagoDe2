<?php
$I = new WebGuy($scenario);
$I->amOnPage('index.php?r=site/compra');
$I->see('Juego de Tronos - George R. R. Martin');
$I->see('Datos de Compra');
$I->seeInField('form[card_number]', '');
$I->seeInField('form[card_expiry]','');
$I->seeInField('form[card_security]','');
$I->seeInField('form[user_id]','');
$I->seeElement('//form/input[1]');
