<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    public const IS_BANNED = '1';
    public const IS_UNBANNED = '0';
    public const IS_ADMIN = '1';
    public const IS_USER = '0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function addUser($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->generatePassword($fields['password']);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        if ($fields['password'] != null) {
            $this->password = bcrypt($fields['password']);
        }
        $this->save();
    }

    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }

    public function removeAvatar()
    {
        if ($this->avatar != null) {
            Storage::delete('uploads/avatars/' . $this->avatar);
        }
    }

    public function uploadAvatar(?UploadedFile $image)
    {
        if ($image == null) { return; }

        $this->removeAvatar();
        $filename = str_random(10).'.'.$image->extension();
        $image->storeAs('uploads/avatars', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }

        return $this;
    }

    public function getImage()
    {
        if ($this->avatar == null) {
            return '/img/no-user-image.png';
        }
        return '/uploads/avatars/' . $this->avatar;
    }

    public function makeAdmin()
    {
        $this->is_admin = User::IS_ADMIN;
        $this->save();

        return $this;
    }

    public function makeUser()
    {
        $this->is_admin = User::IS_USER;
        $this->save();

        return $this;
    }

    public function ban()
    {
        $this->status = User::IS_BANNED;
        $this->save();

        return $this;
    }

    public function unban()
    {
        $this->status = User::IS_UNBANNED;
        $this->save();

        return $this;
    }

    public function toggleAdmin($value)
    {
        if ($value == null) {
            return $this->makeUser();
        }

        return $this->makeAdmin();
    }

    public function toggleBan($value)
    {
        if ($value == null) {
            return $this->unban();
        }

        return $this->ban();
    }

    public function switchBan()
    {
        if ($this->status == User::IS_BANNED) {
            return $this->unban();
        }

        return $this->ban();
    }
}
