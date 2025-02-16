<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\LoanRepository;
use App\Repositories\MovieRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Registrar los repositories
        $this->app->bind(CategoryRepository::class, function () {
            return new CategoryRepository();
        });

        $this->app->bind(BookRepository::class, function () {
            return new BookRepository();
        });

        $this->app->bind(MovieRepository::class, function () {
            return new MovieRepository();
        });

        $this->app->bind(LoanRepository::class, function () {
            return new LoanRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
