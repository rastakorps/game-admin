<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables as DT;

class Permission extends Model
{
    protected $fillable = ['name', 'guard_name', 'display_name', 'status'];

    const GUARD_WEB_NAME = 'web';
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Display the users table.
     *
     * @author José Vega <jose.oakenfold@gmail.com>
     * @return Datatable
     */
    public static function datatable()
    {
        $users = Permission::active()->select(['id', 'display_name'])->get();

        return DT::of($users)
            ->addColumn('actions', function ($permission) {
                return view('permissions.partials.buttons', ['permission' => $permission]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function toggleStatus()
    {
        $this->update([
            'status' => $this->status === self::STATUS_ACTIVE ? self::STATUS_INACTIVE : self::STATUS_ACTIVE
        ]);
    }
}
