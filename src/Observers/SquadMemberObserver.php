<?php

namespace SimplyUnnamed\Seat\Auditor\Observers;

use Seat\Web\Models\Squads\SquadMember;
use SimplyUnnamed\Seat\Auditor\Models\AuditLog;

class SquadMemberObserver
{


    public function created(SquadMember $squadMember)
    {
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'SquadMember.Created',
            'table' => $squadMember->getTable(),
            'model' => get_class($squadMember),
            'primary_keys' => json_encode($squadMember->getAttributes()),
            'old_values' => json_encode($squadMember->getAttributes()),
        ]);
    }

    

    public function deleted(SquadMember $squadMember)
    {
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'SquadMember.Remove',
            'table' => $squadMember->getTable(),
            'model' => get_class($squadMember),
            'primary_keys' => json_encode($squadMember->getAttributes()),
            'old_values' => json_encode($squadMember->getAttributes()),
        ]);
        
        
    }
}