<?php

namespace app\Policies;

use app\User;
use app\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *
     * @param  \app\User  $user
     * @param  \app\Product  $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \app\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \app\User  $user
     * @param  \app\Product  $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
		return $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \app\User  $user
     * @param  \app\Product  $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        //
    }
}
