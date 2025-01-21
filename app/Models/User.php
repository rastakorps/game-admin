<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Yajra\DataTables\Facades\DataTables as DT;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Display the users table.
     *
     * @author José Vega <jose.oakenfold@gmail.com>
     * @return Datatable
     */
    public static function datatable()
    {
        $users = User::select(['id', 'name', 'email', 'created_at']);

        /*if (!Auth::user()->isAdmin()) {
            $query->hideAdmin();
            $query->hideAuthUser();
        }*/

        return DT::of($users)
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? $user->created_at->format('d/m/Y') : '';
            })
            ->addColumn('actions', function ($user) {
                return view('users.partials.buttons', ['user' => $user]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
