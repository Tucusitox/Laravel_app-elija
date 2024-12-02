<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * 
 * @property int $id_question
 * @property string $question
 * 
 * @property Collection|SecretQuestion[] $secret_questions
 *
 * @package App\Models
 */
class Question extends Model
{
	protected $table = 'questions';
	protected $primaryKey = 'id_question';
	public $timestamps = false;

	protected $fillable = [
		'question'
	];

	public function secret_questions()
	{
		return $this->hasMany(SecretQuestion::class, 'fk_question');
	}
}
