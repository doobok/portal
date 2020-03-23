<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Search extends Model
{
    use Searchable;

    public function toSearchableArray()
      {
        $array = $this->toArray();

        return array(
            'id' => $array['id'],
            'title' => $array['title'],
            'uri' => $array['uri'],
            'model' => $array['model'],
            'model_id' => $array['model_id'],
        );
      }
}
