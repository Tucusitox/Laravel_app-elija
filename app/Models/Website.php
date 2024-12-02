<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Website
 * 
 * @property int $id_website
 * @property int $fk_user
 * @property string $website_tittle
 * @property string $website_url
 * @property string $website_img
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Website extends Model
{
	protected $table = 'websites';
	protected $primaryKey = 'id_website';
	public $timestamps = false;

	protected $casts = [
		'fk_user' => 'int'
	];

	protected $fillable = [
		'fk_user',
		'website_tittle',
		'website_url',
		'website_img'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'fk_user');
	}
}
