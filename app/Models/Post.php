<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $description
 * @property string|null $url
 * @property bool|null $published
 * @property int $category_id
 * @property int $author_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $resume
 * @property string $keywords
 * @property string|null $cover_image
 *
 * @property Category $category
 * @property User $user
 * @property Collection|Comment[] $comments
 * @property Collection|Section[] $sections
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';

	protected $casts = [
		'published' => 'bool',
		'category_id' => 'int',
		'author_id' => 'int'
	];

	protected $fillable = [
		'title',
		'subtitle',
		'description',
		'url',
		'published',
		'category_id',
		'author_id',
		'resume',
		'keywords',
		'cover_image'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function author()
	{
		return $this->belongsTo(User::class, 'author_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function sections()
	{
		return $this->hasMany(Section::class);
	}

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'videable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
