<?php namespace App\Auth;

use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\UserProvider as UserProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use DB;

use Debugbar;

class CustomUserProvider implements UserProvider
{

	protected $model;

	public function __construct(UserContract $model)
	{
		$this->model = $model;
	}

	public function retrieveById($identifier)
	{
		$user = DB::table('users')->where(['id' => $identifier])->first();
		if ($user)
			return new GenericUser(
			[
				'id' => $user->id,
				'name' => $user->name,
				'password' => $user->password,
				'firstname' => $user->firstname,
				'lastname' => $user->lastname
			]);
		return null;
	}

	public function retrieveByToken($identifier, $token)
	{

	}

	public function updateRememberToken(UserContract $user, $token)
	{

	}

	public function retrieveByCredentials(array $credentials)
	{
		$user = $this->getUser($credentials);
		if (!$user) return null;
		return $user;
	}

	public function validateCredentials(UserContract $user, array $credentials)
	{
		if(Hash::check($credentials['pass'], $user->password)) return true;
		//if($credentials['pass'] == $user->pass) return true;
		return false;
	}
	
	protected function getUser($credentials)
	{
		$user = DB::table('users')->where(['name' => $credentials['name']])->first();
		if($user)
		{
			return new GenericUser(
			[
				'id' => $user->id,
				'name' => $user->name,
				'password' => $user->password,
				'firstname' => $user->firstname,
				'lastname' => $user->lastname
			]);
		}
	}
}