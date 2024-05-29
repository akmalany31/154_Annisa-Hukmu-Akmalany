<?php

namespace Modules\Shop\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Builder;

use Modules\Shop\App\Models\Product;

class CartItem extends Model
{
    use UuidTrait;


    protected $table = 'shop_cart_items';

    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getSubTotalAttribute()
    {
        return number_format($this->qty * $this->product->price);
    }
}
