<?php
$I = new FunctionalTester($scenario);

$I->am('an Edutalk member');
$I->wantTo('want to create a group');

$I->signIn();

$I->amOnPage('/g/create');
$I->fillField('name', 'Test Group');
$I->fillField('description', 'Test Description');

$I->click('Gruppe erstellen');

$I->see('Die Gruppe wurde erstellt!');