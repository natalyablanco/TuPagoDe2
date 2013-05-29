<?php
$I = new TestGuy($scenario);
$I->wantTo('See a payment form');
$I->amOnPage('index.php?r=site/compra');
$I->seeElement('.image');
$I->see('Juego de Tronos - George R. R. Martin');
$I->seeInField('Amount','500');
$I->seeInField('Merchant USN','19949576');
$I->seeInField('Merchant Id','TESTSTORE');
$I->seeInField('Order Id','19949576');
$I->seeInField('Card Number', '');
$I->seeInField('Expiry Date','');
$I->seeInField('Security Code','');
$I->seeInField('Id User','');
$I->seeElement('//form/input[1]');
