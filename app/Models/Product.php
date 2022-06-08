<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;protected $guarded = [];

    //use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    //protected $dates = ['deleted_at'];
    /**
     * Override parent boot and Call deleting event
     *
     * @return void
     */
    /*protected static function boot()
    {
      parent::boot();

      static::deleting(function($products) {
         foreach ($products->categories()->get() as $category) {
            $category->delete();
         }
      });
    }*/
    /**
     * Define relationship with Comment model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /*public function categories()
    {
       $this->hasMany('App\Category');
    }*/

    /*protected static function boot()
    {
        static::deleting(function ($instance) {
            $instance->child->each->delete();
        });

        static::restoring(function ($instance) {
            $instance->child->each->restore();
        });
    }*/
}
