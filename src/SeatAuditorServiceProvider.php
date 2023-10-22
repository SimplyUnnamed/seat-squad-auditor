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
    }

    public function register()
    {


    }


    public function getName(): string
    {
        return 'Seat Squad Auditor';
    }

    public function getPackageRepositoryUrl(): string
    {
        return 'https://github.com/SimplyUnnamed/seat-squad-auditor/';
    }

    public function getPackagistPackageName(): string
    {
        return 'seat-squad-auditor';
    }

    public function getPackagistVendorName(): string
    {
        return 'simplyunnamed';
    }
}