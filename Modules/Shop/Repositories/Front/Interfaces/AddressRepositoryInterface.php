<?php

namespace Modules\Shop\Repositories\Front\Interfaces;

use App\Models\User;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\CartItem;
use Modules\Shop\App\Models\Product;

interface AddressRepositoryInterface
{
    public function findByUser(User $user);
    public function findByID(string $id);
}
