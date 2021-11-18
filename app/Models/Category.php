<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string|null $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $description
 * 
 * @property Collection|Post[] $posts
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'title',
		'description'
	];

	public function posts()
	{
		return $this->hasMany(Post::class);
	}
}
