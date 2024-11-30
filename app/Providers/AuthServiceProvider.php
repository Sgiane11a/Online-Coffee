<?php

namespace App\Providers;

use App\Models\Reservation;
use App\Policies\ReservationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * El mapeo de políticas para la aplicación.
     *
     * @var array
     */
    protected $policies = [
        Reservation::class => ReservationPolicy::class,
    ];

    /**
     * Registra cualquier servicio de autenticación / autorización.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
