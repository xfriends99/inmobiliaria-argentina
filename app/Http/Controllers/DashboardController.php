<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $usersPerMonth = $this->users->countOfNewUsersPerMonth(
            Carbon::now()->startOfYear(),
            Carbon::now()
        );
        $stats = [
            'total' => $this->users->count(),
            'new' => $this->users->newUsersCount()
        ];
        $latestRegistrations = $this->users->latest(7);
        return view('dashboard.admin', compact('stats', 'latestRegistrations', 'usersPerMonth'));
    }
}
