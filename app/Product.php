<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Searchable\Searchable;
// use Spatie\Searchable\SearchResult;
// use Sofa\Eloquence\Eloquence;
// use Laravel\Scout\Searchable;

class Product extends Model
{

  protected $fillable = [
      'title', 'product-image', 'price', 'category_id', 'description', 'user_id', 'slug'
  ];

// RELACIONES
  public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }
// FIN DE RELACIONES

  public function getScoutKey()
    {
        return $this->title;
    }
  //   public function getSearchResult(): SearchResult
  //       {
  //           $url = route('products.show', $this->id);
  //
  //           return new SearchResult(
  //               $this,
  //               $this->title,
  //               $url
  //            );
  //       }
}
