<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Search;


class Post extends Model
{
  public function tags()
  {
      return $this->belongsToMany('App\Tag');
  }

  protected static function boot()
  {
      static::created(function($instance)
      {
          // записуем в БД для поиска
          if ($instance->status === 'PUBLISHED'){
            $item = new Search;
            $item->model = 'post';
            $item->model_id = $instance->id;
            $item->title = $instance->title;
            $item->uri = 'news/' . $instance->slug;
            $item->save();
          }

      });

      static::saving(function($instance)
      {
          // добавляем в поиск
          if ($instance->id) {
            $item = Search::where('model', 'post')->where('model_id', $instance->id)->first();

            if ($item != null) {
              if ($instance->status != 'PUBLISHED') {
                $item->delete();
              } else {
                $item->model = 'post';
                $item->model_id = $instance->id;
                $item->title = $instance->title;
                $item->uri = 'news/' . $instance->slug;
                $item->save();
              }
            } else {
              $item = new Search;
              $item->model = 'post';
              $item->model_id = $instance->id;
              $item->title = $instance->title;
              $item->uri = 'news/' . $instance->slug;
              $item->save();
            }
          }

          // Отправка в соцсети
          // if ($instance->status == 'PUBLISHED')
          // {
          //     // отправляем публикацию в соцсети
          //     if ($instance->posted_social < 1){
          //
          //       $instance->posted_social = 1;
          //       \Event::fire(new SocialPublishEvent($instance));
          //     }
          //
          //   };
      });

      // Обновляем  поиск при изменении
      static::updating(function($instance)
      {
          $item = Search::where('model', 'post')->where('model_id', $instance->id);
          $item->update([
            'title' => $instance->title,
            'uri' => 'news/' . $instance->slug

          ]);

      });

      // при удалении удаляем с БД поиска
      static::deleting(function($instance)
      {
          $item = Search::where('model', 'post')->where('model_id', $instance->id);
          $item->delete();

      });

      parent::boot();
  }

}
