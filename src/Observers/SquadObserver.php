<?php

namespace SimplyUnnamed\Seat\Auditor\Observers;

use Illuminate\Support\Arr;
use Seat\Web\Models\Squads\Squad;
use SimplyUnnamed\Seat\Auditor\Models\AuditLog;

class SquadObserver
{


    public function created(Squad $squad)
    {
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'Squad.Created',
            'table' => $squad->getTable(),
            'model' => get_class($roleSquad),
            'primary_keys' => $squad->id,
            'new_values' => json_encode($squad->getAttributes()),
        ]);
    }

    public function updated(Squad $squad)
    {
        $updatedKeys = array_keys($squad->getChanges());
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'Squad.Updated',
            'table' => $squad->getTable(),
            'model' => get_class($squad),
            'primary_keys' => $squad->id,
            'old_values' => json_encode(Arr::only($squad->getOriginal(), $updatedKeys)),
            'new_values' => json_encode($squad->getChanges()),
        ]);
    }

    

    public function deleted(Squad $squad)
    {
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'Squad.Removed',
            'table' => $squad->getTable(),
            'model' => get_class($squad),
            'primary_keys' => $squad->id,
            'old_values' => json_encode($squad->getAttributes()),
        ]);
    }
}