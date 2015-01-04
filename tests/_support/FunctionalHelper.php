<?php
namespace Codeception\Module;

use Faker\Factory as Faker;
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
		$faker = Faker::create();
		User::create([
                'email' => $overrides['email'],
                'username' => $faker->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => Hash::make($overrides['password'])
			]);
	}

}
