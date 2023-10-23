<?php

namespace SimplyUnnamed\Seat\Auditor\Observers;
use Illuminate\Support\Arr;
use Seat\Web\Models\User;
use SimplyUnnamed\Seat\Auditor\Models\AuditLog;

class UserObserver
{


    public function created(User $user)
    {
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'User.Created',
            'table' => $user->getTable(),
            'model' => get_class($user),
            'primary_keys' => $user->getKey(),
            'old_values' => json_encode($user->getAttributes()),
        ]);
    }

    public function updated(User $user)
    {
        $updatedKeys = array_keys($user->getChanges());
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'User.Updated',
            'table' => $user->getTable(),
            'model' => get_class($user),
            'primary_keys' => $user->getKey(),
            'old_values' => json_encode(Arr::only($user->getOriginal(), $updatedKeys)),
            'new_values' => json_encode($user->getChanges()),
        ]);
    }

    

    public function deleted(User $user)
    {
        AuditLog::create([
            'user_id' => \Auth::check() ?  \Auth::user()->id : null,
            'action' => 'User.Remove',
            'table' => $user->getTable(),
            'model' => get_class($user),
            'primary_keys' => $user->getKey(),
            'old_values' => json_encode($user->getAttributes()),
        ]);
        
        
    }
}