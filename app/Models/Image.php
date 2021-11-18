<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * 
 * @property int $id
 * @property string|null $url
 * @property int $imageable_id
 * @property string $imageable_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Image extends Model
{
	protected $table = 'images';

	protected $casts = [
		'imageable_id' => 'int'
	];

	protected $fillable = [
		'url',
		'imageable_id',
		'imageable_type'
	];
}
