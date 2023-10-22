<?php

namespace SimplyUnnamed\Seat\Auditor;


use Seat\Services\AbstractSeatPlugin;
use Seat\Web\Models\Squads\SquadMember;
use Seat\Web\Models\Squads\SquadRole;
use Seat\Web\Models\Squads\Squad;
use SimplyUnnamed\Seat\Auditor\Observers\SquadMemberObserver;
use SimplyUnnamed\Seat\Auditor\Observers\SquadRoleObserver;
use SimplyUnnamed\Seat\Auditor\Observers\SquadObserver;

class SeatAuditorServiceProvider extends AbstractSeatPlugin
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
        
        SquadMember::observe(SquadMemberObserver::class);
        SquadRole::observe(SquadRoleObserver::class);
        Squad::observe(SquadObserver::class);

        // $this->loadRoutesFrom(__DIR__.'/Http/routes.php');

        // $this->add_views();
        // $this->add_routes();
    }

    public function register()
    {

    //    $newEntries = require __DIR__ .'/Config/doctrine.sidebar.php';
    //    $entries = $this->app['config']->get("package.sidebar.doctrine.entries");
    //    $this->app['config']->set("package.sidebar.doctrine.entries", array_merge($entries, $newEntries));
    }

    public function add_routes()
    {
        
    }

    public function add_views()
    {
        // $this->loadViewsFrom(__DIR__.'/resources/views', 'doctrine');
    }

    public function getName(): string
    {
        return 'Seat Auditor';
    }

    public function getPackageRepositoryUrl(): string
    {
        return 'https://github.com/SimplyUnnamed/seat-auditor/';
    }

    public function getPackagistPackageName(): string
    {
        return 'seat-auditor';
    }

    public function getPackagistVendorName(): string
    {
        return 'simplyunnamed';
    }
}