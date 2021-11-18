<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Taggable
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $taggable_id
 * @property string $taggable_type
 * @property int $tag_id
 * 
 * @property Tag $tag
 *
 * @package App\Models
 */
class Taggable extends Model
{
	protected $table = 'taggables';

	protected $casts = [
		'taggable_id' => 'int',
		'tag_id' => 'int'
	];

	protected $fillable = [
		'taggable_id',
		'taggable_type',
		'tag_id'
	];

	public function tag()
	{
		return $this->belongsTo(Tag::class);
	}
}
