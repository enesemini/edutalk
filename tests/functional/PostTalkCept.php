<?php
$I = new FunctionalTester($scenario);
$I->am('an Edutalk member');
$I->wantTo('create a new talk on Edutalk');

$I->signIn();
$I->amOnPage('/dashboard');
$I->fillField('message', 'CodeCept Test Talk');
$I->click('Talk erstellen');
$I->seeCurrentUrlEquals('/dashboard');
$I->see('Ihr Talk wurde gespeichert!');
$I->seeRecord('talks', [
	'message' => 'CodeCept Test Talk'
]);