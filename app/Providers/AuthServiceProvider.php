<?php

namespace app\Providers;

use app\Policies\ProductPolicy;
use app\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * 定义哪个model和policy对应
	 */
    protected $policies = [
		Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

		Gate::define('test', function ($user,$id) {
			return $user['id'] == $id;
		});
    }
}
