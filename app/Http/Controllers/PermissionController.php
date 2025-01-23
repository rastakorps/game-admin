<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    const PERMISSIONS_INDEX = 'permissions.index';
    const PERMISSIONS_CREATE = 'permissions.create';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax() || request()->expectsJson()) {
            return Permission::datatable();
        }

        return view(self::PERMISSIONS_INDEX);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PERMISSIONS_CREATE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        try {
            DB::beginTransaction();
            $permissionData = [
                'name' => Str::slug($request->display_name, '_'),
                'guard_name' => Permission::GUARD_WEB_NAME,
                'display_name' => ucfirst($request->display_name)
            ];
            Permission::create($permissionData);
            DB::commit();

            return redirect()->route(self::PERMISSIONS_INDEX)->with('success', 'Se ha creado un nuevo permiso');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
