<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SecretQuestion
 * 
 * @property int $id_secretQuestion
 * @property int $fk_question
 * @property int $fk_user
 * @property string $answer
 * 
 * @property Question $question
 * @property User $user
 *
 * @package App\Models
 */
class SecretQuestion extends Model
{
	protected $table = 'secret_questions';
	protected $primaryKey = 'id_secretQuestion';
	public $timestamps = false;

	protected $casts = [
		'fk_question' => 'int',
		'fk_user' => 'int'
	];

	protected $hidden = [
		'id_secretQuestion'
	];

	protected $fillable = [
		'fk_question',
		'fk_user',
		'answer'
	];

	public function question()
	{
		return $this->belongsTo(Question::class, 'fk_question');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'fk_user');
	}
}
