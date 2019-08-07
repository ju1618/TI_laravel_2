<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Category extends Model
{
  protected $fillable = ['name', 'slug'];

  // public function product()
	// {
	// 	return $this->hasMany(Product::class);
	// }
}
