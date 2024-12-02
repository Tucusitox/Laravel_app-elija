<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 * 
 * @property int $id_person
 * @property int $fk_gender
 * @property int $fk_nationality
 * @property string $person_identification
 * @property string $person_img
 * @property string $person_name
 * @property string $person_lastname
 * @property Carbon $person_birthDate
 * @property string $person_description
 * @property string $person_address
 * 
 * @property Gender $gender
 * @property Nationality $nationality
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Person extends Model
{
	protected $table = 'persons';
	protected $primaryKey = 'id_person';
	public $timestamps = false;

	protected $casts = [
		'fk_gender' => 'int',
		'fk_nationality' => 'int',
		'person_birthDate' => 'datetime'
	];

	protected $fillable = [
		'fk_gender',
		'fk_nationality',
		'person_identification',
		'person_img',
		'person_name',
		'person_lastname',
		'person_birthDate',
		'person_description',
		'person_address'
	];

	public function gender()
	{
		return $this->belongsTo(Gender::class, 'fk_gender');
	}

	public function nationality()
	{
		return $this->belongsTo(Nationality::class, 'fk_nationality');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'fk_person');
	}
}
