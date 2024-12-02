<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nationality
 * 
 * @property int $id_nationality
 * @property string $nationality_name
 * @property string $nationality_regex
 * 
 * @property Collection|Person[] $people
 *
 * @package App\Models
 */
class Nationality extends Model
{
	protected $table = 'nationalities';
	protected $primaryKey = 'id_nationality';
	public $timestamps = false;

	protected $fillable = [
		'nationality_name',
		'nationality_regex'
	];

	public function people()
	{
		return $this->hasMany(Person::class, 'fk_nationality');
	}
}
