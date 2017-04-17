<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;
use app\Http\Services\ImageService;

class ImageServiceProvider extends ServiceProvider
{
	/**
	 * 服务提供者加是否延迟加载.
	 *
	 * @var bool
	 */
	protected $defer = true;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.[如果是使用延迟加载服务类，register方法不会生效]
     */
    public function register()
    {
		//使用singleton绑定单例 服务容器绑定
        $this->app->singleton('image', function () {
            return new ImageService();
        });

		//使用bind绑定实例到接口以便依赖注入  construct 方法中
		/*$this->app->bind('app\Http\Services\ImageService', function () {
			//return new ImageService();
		});*/
	}

	/**
	 * 获取由提供者提供的服务.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [ImageService::class];
	}
}
