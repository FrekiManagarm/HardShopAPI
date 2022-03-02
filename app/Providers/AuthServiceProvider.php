<?php

namespace App\Providers;

use App\Models\Boitier;
use App\Models\Cooling;
use App\Models\CPU;
use App\Models\GPU;
use App\Models\HDD;
use App\Models\MotherBoard;
use App\Models\PSU;
use App\Models\RAM;
use App\Models\SSD;
use App\Models\User;
use App\Policies\CasePolicy;
use App\Policies\CoolingPolicy;
use App\Policies\CPUPolicy;
use App\Policies\GPUPolicy;
use App\Policies\HDDPolicy;
use App\Policies\MotherBoardPolicy;
use App\Policies\PSUPolicy;
use App\Policies\RAMPolicy;
use App\Policies\SSDPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        HDD::class => HDDPolicy::class,
        MotherBoard::class => MotherBoardPolicy::class,
        PSU::class => PSUPolicy::class,
        RAM::class => RAMPolicy::class,
        GPU::class => GPUPolicy::class,
        SSD::class => SSDPolicy::class,
        Cooling::class => CoolingPolicy::class,
        CPU::class => CPUPolicy::class,
        Boitier::class => CasePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
