<?php

namespace App\Providers;

use App\Models\User;
use App\Nova\Brand;
use App\Nova\Dashboards\Main;
use App\Nova\Vehicle;
use App\Nova\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Laravel\Fortify\Features;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();

        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('chart-bar'),

                MenuSection::resource(Vehicle::class)
                    ->icon('truck'),

                MenuSection::resource(\App\Nova\User::class)
                    ->icon('user'),


                MenuSection::make('Configuration', [
                    MenuItem::resource(VehicleModel::class),
                    MenuItem::resource(Brand::class),
                ])->icon('cog-6-tooth')->collapsable()->collapsedByDefault(),
            ];
        });

        Nova::footer(function (Request $request) {
            return Blade::render('
                <p class="text-center">Powered by <a class="link-default" href="https://portaildailyup.xefi.fr">DailyUp</a> · v{!! $version !!}</p>
                <p class="text-center">&copy; {!! $year !!} XEFI.</p>
            ', [
                    'version' => Nova::version(),
                    'year' => date('Y'),
                ]);
        });
    }

    /**
     * Register the configurations for Laravel Fortify.
     */
    protected function fortify(): void
    {
        Nova::fortify()
            ->features([
                Features::updatePasswords(),
                // Features::emailVerification(),
                // Features::twoFactorAuthentication(['confirm' => true, 'confirmPassword' => true]),
            ])
            ->register();
    }

    /**
     * Register the Nova routes.
     */
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes(default: true)
            ->withPasswordResetRoutes()
            ->withoutEmailVerificationRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewNova', function (User $user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array<int, \Laravel\Nova\Dashboard>
     */
    protected function dashboards(): array
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array<int, \Laravel\Nova\Tool>
     */
    public function tools(): array
    {
        return [];
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        parent::register();

        //
    }
}
