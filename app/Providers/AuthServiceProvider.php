<?php

namespace App\Providers;

use App\Models\Opinion;
use App\Models\SocialMedia;
use App\Policies\CategoryPolicy;
use App\Policies\JobPolicy;
use App\Policies\ServicePolicy;
use App\Policies\SettingPolicy;
use App\Policies\SliderPolicy;
use App\Policies\SocialMediaPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\User' => UserPolicy::class,
        'App\Models\Category' => CategoryPolicy::class,
        'App\Models\Job' => JobPolicy::class,
        'App\Models\Opinion' => Opinion::class,
        'App\Models\Service' => ServicePolicy::class,
        'App\Models\Setting' => SettingPolicy::class,
        'App\Models\Slider' => SliderPolicy::class,
        'App\Models\SocialMedia' => SocialMediaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
