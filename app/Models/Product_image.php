<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    use HasFactory;
    protected $guarded = [];

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
