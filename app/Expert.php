<?php

namespace App;

use QCod\ImageUp\HasImageUploads;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasImageUploads;

    protected static $imageFields = [
          'image' => [
              // width to resize image after upload
              'width' => 800,

              // a folder path on the above disk, default config('imageup.upload_directory')
              'path' => 'experts',

              // validation rules when uploading image
              'rules' => 'image|max:5000',

              // override global auto upload setting coming from config('imageup.auto_upload_images')
              'auto_upload' => true,

          ],
      ];

}
