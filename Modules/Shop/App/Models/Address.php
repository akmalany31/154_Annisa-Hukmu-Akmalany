<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\AddressFactory;

use App\Traits\UuidTrait;

class Address extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_addresses';

    protected $fillable = [];

    protected static function newFactory()
    {
        return AddressFactory::new();
    }
}
