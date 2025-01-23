<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables as DT;

class Permission extends Model
{
    protected $fillable = ['name', 'guard_name', 'display_name'];

    const GUARD_WEB_NAME = 'web';

    /**
     * Display the users table.
     *
     * @author José Vega <jose.oakenfold@gmail.com>
     * @return Datatable
     */
    public static function datatable()
    {
        $users = Permission::select(['id', 'display_name']);

        return DT::of($users)
            ->addColumn('actions', function ($permission) {
                return view('permissions.partials.buttons', ['permission' => $permission]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
