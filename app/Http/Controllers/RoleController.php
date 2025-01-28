<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    const ROLES_INDEX = 'roles.index';
    const ROLES_CREATE = 'roles.create';
    const ROLES_EDIT = 'roles.edit';
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax() || request()->expectsJson()) {
            return Role::datatable();
        }

        return view(self::ROLES_INDEX);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view(self::ROLES_CREATE, compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validated();
            $role = Role::create($request->only('name'));
            $role->permissions()->sync($validated['permissions']);

            DB::commit();

            return redirect()->route(self::ROLES_INDEX)->with('success', 'Se ha creado un nuevo rol');
        } catch (Exception $e) {
            DB::rollBack();

            logger()->debug($e->getMessage());
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
