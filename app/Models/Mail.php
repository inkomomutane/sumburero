<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mail
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $message
 * @property string|null $phone
 * @property string|null $email
 * @property bool|null $newslatter
 *
 * @package App\Models
 */
class Mail extends Model
{
	protected $table = 'mails';

	protected $casts = [
		'newslatter' => 'bool'
	];

	protected $fillable = [
		'name',
		'message',
		'phone',
		'email',
		'newslatter'
	];
}
