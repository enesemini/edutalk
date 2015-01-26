<?php
namespace Codeception\Module;

use User;
use Hash;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
	public function signIn()
	{
		$email = 'test@email.com';
		$password = 'secret';
		$this->haveAnAccount(compact('email', 'password'));

		$I = $this->getModule('Laravel4');

		$I->amOnPage('/login');
		$I->fillField('email', $email);
		$I->fillField('password', $password);

		$I->click('.btn-et');
	}

	public function haveAnAccount($overrides = [])
	{
		User::create([
                'email' => $overrides['email'],
                'username' => 'TestUserName',
                'first_name' => 'TestFirstName',
                'last_name' => 'TestLastName',
                'password' => Hash::make($overrides['password']),
                'confirmed' => '1'
			]);
	}

}
