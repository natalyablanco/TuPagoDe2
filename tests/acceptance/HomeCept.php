<?php
$I = new WebGuy($scenario);
$I->wantTo('see a book that I want to buy');
$I->amOnPage('/');
$I->see('Juego de tronos');
$I->see('Comprar');
$I->click('Comprar');

