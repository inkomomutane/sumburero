<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Taggable[] $taggables
 *
 * @package App\Models
 */
class Tag extends Model
{
	protected $table = 'tags';

	protected $fillable = [
		'name'
	];

	public function taggables()
	{
		return $this->hasMany(Taggable::class);
	}
}
