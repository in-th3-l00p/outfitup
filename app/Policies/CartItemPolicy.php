<?php

namespace App\Policies;

use App\Models\CartItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CartItemPolicy
{
    public function viewAny(User $user): bool {
        return true;
    }

    public function view(User $user, CartItem $cartItem): bool {
        return true;
    }

    public function create(User $user): bool {
        return true;
    }

    public function update(User $user, CartItem $cartItem): bool {
        return $cartItem->user_id === $user->id;
    }

    public function delete(User $user, CartItem $cartItem): bool {
        return $cartItem->user_id === $user->id;
    }

    public function restore(User $user, CartItem $cartItem): bool {
        return $cartItem->user_id === $user->id;
    }

    public function forceDelete(User $user, CartItem $cartItem): bool {
        return $cartItem->user_id === $user->id;
    }
}
