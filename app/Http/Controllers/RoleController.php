<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
