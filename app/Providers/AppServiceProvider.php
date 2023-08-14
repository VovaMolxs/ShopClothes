<?php

namespace App\Providers;

use App\Services\PaymentService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentService::class, function ($app) {
            return new PaymentService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page'): LengthAwarePaginator {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage)->values(),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
