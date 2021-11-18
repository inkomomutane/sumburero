<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * 
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property string $comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $post_id
 * 
 * @property Post $post
 *
 * @package App\Models
 */
class Comment extends Model
{
	protected $table = 'comments';

	protected $casts = [
		'post_id' => 'int'
	];

	protected $fillable = [
		'name',
		'email',
		'comment',
		'post_id'
	];

	public function post()
	{
		return $this->belongsTo(Post::class);
	}
}
