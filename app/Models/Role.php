<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables as DT;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'guard_name'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->guard_name = 'web';
        });
    }

    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    public static function datatable()
    {
        $roles = Role::active()->select(['id', 'name'])->get();

        return DT::of($roles)
            ->addColumn('assigned_permissions', function ($role) {
                return $role->getAllPermissions()->implode('display_name', '<br>');
            })
            ->addColumn('actions', function ($role) {
                return view('roles.partials.buttons', ['role' => $role]);
            })
            ->rawColumns(['actions', 'assigned_permissions'])
            ->make(true);
    }
}
