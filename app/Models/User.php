<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $user_id
 * @property int $fk_person
 * @property string $email
 * @property string $password
 * @property string|null $email_verified
 * 
 * @property Person $person
 * @property Collection|SecretQuestion[] $secret_questions
 * @property Collection|SessionsUser[] $sessions_users
 * @property Collection|SocialnetworksXUser[] $socialnetworks_x_users
 * @property Collection|Website[] $websites
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	public $timestamps = false;

	protected $casts = [
		'fk_person' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'fk_person',
		'email',
		'password',
		'email_verified'
	];

	public function person()
	{
		return $this->belongsTo(Person::class, 'fk_person');
	}

	public function secret_questions()
	{
		return $this->hasMany(SecretQuestion::class, 'fk_user');
	}

	public function sessions_users()
	{
		return $this->hasMany(SessionsUser::class, 'fk_user');
	}

	public function socialnetworks_x_users()
	{
		return $this->hasMany(SocialnetworksXUser::class, 'fk_user');
	}

	public function websites()
	{
		return $this->hasMany(Website::class, 'fk_user');
	}
}
