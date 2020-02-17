<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use QCod\ImageUp\HasImageUploads;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use Notifiable, HasImageUploads;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    // avatar update
    protected static $imageFields = [
          'avatar' => [
              // width to resize image after upload
              'width' => 300,
              'height' => 300,
              'crop' => true,

              // a folder path on the above disk, default config('imageup.upload_directory')
              'path' => 'users',

              // validation rules when uploading image
              'rules' => 'image|max:5000',

              // override global auto upload setting coming from config('imageup.auto_upload_images')
              'auto_upload' => true,

          ],
      ];
    // user publications
    public function initiatives()
    {
        return $this->hasMany('App\Initiative');
    }
    // sibscribed initiatives
    public function events()
    {
        return $this->belongsToMany('App\Initiative', 'initiative_user');
    }
    // income messages
    public function messages()
    {
        return $this->hasMany('App\Message', 'to');
    }
}
