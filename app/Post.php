<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;

    public const IS_DRAFT = '0';
    public const IS_PUBLIC = '1';
    public const IS_STANDART = '0';
    public const IS_FEATURED = '1';

    protected $fillable = ['title', 'content', 'date', 'description'];

    protected $previous_post = null;
    protected $next_post = null;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields, int $user_id)
    {
        $post = new static();
        $post->fill($fields);
        $post->user_id = $user_id;
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();

        return $this;
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function uploadImage($image)
    {
        if ($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10).'.'.$image->extension();
        $image->storeAs('uploads/images', $filename);
        $this->thumbnail = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if ($this->thumbnail != null) {
            Storage::delete('uploads/images/' . $this->thumbnail);
        }
    }

    public function setCategory($id)
    {
        if ($id == null) { return; }
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) { return; }

        $this->tags()->sync($ids);
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setFeatured()
    {
        $this->is_featured = Post::IS_FEATURED;
        $this->save();
    }

    public function setUnfeatured()
    {
        $this->is_featured = Post::IS_STANDART;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public function toggleFeatured($value)
    {
        if ($value == null) {
            return $this->setUnfeatured();
        }

        return $this->setFeatured();
    }

    public function getImage()
    {
        if ($this->thumbnail == null) {
            return '/img/no-image.png';
        }
        return '/uploads/images/' . $this->thumbnail;
    }

    public function getCategoryTitle()
    {
        return ($this->category == null) ?
                'No category' :
                $this->category->title;
    }

    public function getTagsTitles()
    {
        return ($this->tags->isEmpty()) ?
                'No tags' :
                implode(', ', $this->tags->pluck('title')->all());
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        return $date;
    }

    public function getCategoryId()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/Y', $this->date)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getPrevious()
    {
        if ($this->previous_post === null) {
            $id = $this->hasPrevious();
            $this->previous_post = self::find($id);
        }
        return $this->previous_post;
    }

    public function getNext()
    {
        if ($this->next_post === null) {
            $id = $this->hasNext();
            $this->next_post = self::find($id);
        }
        return $this->next_post;
    }

    public function related()
    {
        return self::all()->except($this->id)->take(10);
    }

    public function hasCategory()
    {
        return $this->category != null;
    }

    public static function getPopular(int $limit)
    {
        return self::orderBy('views', 'desc')->where('status', Post::IS_PUBLIC)->take($limit)->get();
    }

    public static function getFeatured(int $limit)
    {
        return self::where('is_featured', Post::IS_FEATURED)->where('status', Post::IS_PUBLIC)->take($limit)->get();
    }

    public static function getRecent(int $limit)
    {
        return self::orderBy('date', 'desc')->where('status', Post::IS_PUBLIC)->take($limit)->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status', Comment::IS_ACTIVE)->get();
    }
}
