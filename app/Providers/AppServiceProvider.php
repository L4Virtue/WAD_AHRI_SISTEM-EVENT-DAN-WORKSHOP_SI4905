<?php

namespace App\Providers;

 Erlinda
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
=======
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
 main

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
 Erlinda
       // izinkan admin & panitia kelola/tambah/edit speaker
        Gate::define('kelola-speaker', fn (User $user) => $user->hasRole('admin', 'panitia'));

        // khusus admin saja yang boleh hapus speaker
        Gate::define('hapus-speaker', fn (User $user) => $user->hasRole('admin'));

        Gate::define('hapus-tiket', function (User $user): bool {
        return $user->hasRole('admin');
        });
 main
    }
}
