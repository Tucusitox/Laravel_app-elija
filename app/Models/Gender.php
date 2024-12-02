<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gender
 * 
 * @property int $id_gender
 * @property string $gender_name
 * 
 * @property Collection|Person[] $people
 *
 * @package App\Models
 */
class Gender extends Model
{
	protected $table = 'genders';
	protected $primaryKey = 'id_gender';
	public $timestamps = false;

	protected $fillable = [
		'gender_name'
	];

	public function people()
	{
		return $this->hasMany(Person::class, 'fk_gender');
	}
}
