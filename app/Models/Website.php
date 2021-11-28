<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Website
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $logo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $resume
 * @property string|null $phones
 * @property string|null $emails
 * @property string|null $mission
 * @property string|null $vision
 * @property string|null $objectives
 * @property string|null $country
 * @property Carbon|null $open_at
 * @property Carbon|null $close_at
 *
 * @package App\Models
 */
class Website extends Model
{
	protected $table = 'website';

	protected $dates = [
		'open_at',
		'close_at'
	];

	protected $fillable = [
		'name',
		'logo',
		'resume',
		'phones',
		'emails',
		'mission',
		'vision',
        'map',
        'cover_image',
		'objectives',
		'country',
		'open_at',
		'close_at'
	];
	public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
