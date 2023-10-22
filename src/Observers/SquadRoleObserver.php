<?php

namespace SimplyUnnamed\Seat\Auditor\Observers;

use Seat\Web\Models\Squads\SquadRole;
use SimplyUnnamed\Seat\Auditor\Models\AuditLog;

class SquadRoleObserver
{


    public function created(SquadRole $roleSquad)
    {
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'SquadRole.Created',
            'table' => $roleSquad->getTable(),
            'model' => get_class($roleSquad),
            'primary_keys' => json_encode($roleSquad->getAttributes()),
            'old_values' => json_encode($roleSquad->getAttributes()),
        ]);
    }

    

    public function deleted(SquadRole $roleSquad)
    {
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'SquadRole.Remove',
            'table' => $roleSquad->getTable(),
            'model' => get_class($roleSquad),
            'primary_keys' => json_encode($roleSquad->getAttributes()),
            'old_values' => json_encode($roleSquad->getAttributes()),
        ]);
        
        
    }
}