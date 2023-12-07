<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Costumer;
use App\Models\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['costumer_id', 'product_id', 'number', 'status', 'total_price', 'qty', 'shipping_method', 'notes'];


    protected $casts = [
        'status' => OrderStatus::class
    ];


    public function costumer()
    {
        return $this->belongsTo(Costumer::class, 'costumer_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
