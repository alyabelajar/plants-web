<?php

namespace App\Models;

use App\Models\Order;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'category_id', 'description', 'price', 'discount'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('product')
            ->keepOriginalImageFormat()
            ->width(100);

    }

    public function products()
    {
        return $this->hasMany(Order::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
