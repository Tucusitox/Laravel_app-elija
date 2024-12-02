<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialNetwork
 * 
 * @property int $id_socialNetwork
 * @property string $socialNetwork_name
 * 
 * @property Collection|SocialnetworksXUser[] $socialnetworks_x_users
 *
 * @package App\Models
 */
class SocialNetwork extends Model
{
	protected $table = 'social_networks';
	protected $primaryKey = 'id_socialNetwork';
	public $timestamps = false;

	protected $fillable = [
		'socialNetwork_name'
	];

	public function socialnetworks_x_users()
	{
		return $this->hasMany(SocialnetworksXUser::class, 'fk_socialNetwork');
	}
}
