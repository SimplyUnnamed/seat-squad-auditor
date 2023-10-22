<?php 

namespace SimplyUnnamed\Seat\Auditor\Models; 

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{

    public $table = 'squad_audit_logs';

    
    protected $fillable = [
        'user_id',
        'action',
        'table',
        'model',
        'primary_keys',
        'old_values',
        'new_values'
    ];

}