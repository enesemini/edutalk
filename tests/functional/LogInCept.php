<?php
$I = new FunctionalTester($scenario);
$I->am('an Edutalk member');
$I->wantTo('Log in to Edutalk');

$I->signIn();

$I->seeCurrentUrlEquals('/dashboard');
$I->see('Sie sind jetzt eingeloggt.');

