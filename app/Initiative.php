<?php

namespace App;

use QCod\ImageUp\HasImageUploads;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
  use HasImageUploads;

  protected $fillable = ['status'];

  protected static $imageFields = [
        'image' => [
            // width to resize image after upload
            'width' => 1000,

            // a folder path on the above disk, default config('imageup.upload_directory')
            'path' => 'initiatives',

            // validation rules when uploading image
            'rules' => 'image|max:5000',

            // override global auto upload setting coming from config('imageup.auto_upload_images')
            'auto_upload' => true,

        ],
    ];
    // author
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // registered users
    public function users()
    {
        return $this->belongsToMany('App\User', 'initiative_user');
    }
}
