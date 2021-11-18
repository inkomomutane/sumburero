<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 * 
 * @property int $id
 * @property string|null $url
 * @property int $videable_id
 * @property string $videable_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Video extends Model
{
	protected $table = 'videos';

	protected $casts = [
		'videable_id' => 'int'
	];

	protected $fillable = [
		'url',
		'videable_id',
		'videable_type'
	];
}
