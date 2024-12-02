<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialnetworksXUser
 * 
 * @property int $id_socialNetwUser
 * @property int $fk_socialNetwork
 * @property int $fk_user
 * @property string $socialNetwUser_name
 * 
 * @property SocialNetwork $social_network
 * @property User $user
 *
 * @package App\Models
 */
class SocialnetworksXUser extends Model
{
	protected $table = 'socialnetworks_x_users';
	protected $primaryKey = 'id_socialNetwUser';
	public $timestamps = false;

	protected $casts = [
		'fk_socialNetwork' => 'int',
		'fk_user' => 'int'
	];

	protected $fillable = [
		'fk_socialNetwork',
		'fk_user',
		'socialNetwUser_name'
	];

	public function social_network()
	{
		return $this->belongsTo(SocialNetwork::class, 'fk_socialNetwork');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'fk_user');
	}
}
