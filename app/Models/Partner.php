<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $cover_image
 * @property string|null $partnerscol
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $url
 *
 * @package App\Models
 */
class Partner extends Model
{
	protected $table = 'partners';

	protected $fillable = [
		'name',
		'cover_image',
		'partnerscol',
		'url'
	];
}
