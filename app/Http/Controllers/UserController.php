<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    const USERS_INDEX = 'users.index';
    const USERS_CREATE = 'users.create';

    public function index()
    {
        if (request()->ajax() || request()->expectsJson()) {
            return User::datatable();
        }

        return view(self::USERS_INDEX);
    }

    public function create()
    {
        return view(self::USERS_CREATE);
    }

    public function store()
    {
        return view(self::USERS_CREATE);
    }
}