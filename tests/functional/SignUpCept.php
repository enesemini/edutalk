<?php
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a Edutalk account');

$I->amOnPage('/');
$I->click('Registrieren');
$I->seeCurrentUrlEquals('/registrieren');

$I->fillField('Username:', 'TestUser');
$I->fillField('Name:', 'Test');
$I->fillField('Vorname:', 'User');
$I->fillField('Email:', 'test@test.com');
$I->fillField('Passwort:', 'secret');
$I->fillField('Passwort bestätigen:', 'secret');

$I->click('.btn-et');


$I->seeCurrentUrlEquals('/login');
$I->see('Sie erhalten in kürze eine Email zur Aktivierung Ihres Accounts.');
$I->seeRecord('users', [
	'username' => 'TestUser'
]);