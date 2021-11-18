<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int $post_id
 * @property string|null $cover_image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Post $post
 *
 * @package App\Models
 */
class Section extends Model
{
	protected $table = 'sections';

	protected $casts = [
		'post_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'post_id',
		'cover_image'
	];

	public function post()
	{
		return $this->belongsTo(Post::class);
	}

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'videable');
    }
}
