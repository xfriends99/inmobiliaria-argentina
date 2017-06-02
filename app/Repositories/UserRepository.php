<?php

namespace App\Repositories;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\SQLiteConnection;

class UserRepository extends AbstractRepository
{
    protected $months = ['January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo', 'April' => 'Abril',
        'May' => 'Mayo', 'June' => 'Junio', 'July' => 'Julio', 'August' => 'Agosto', 'September' => 'Septiembre',
        'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre'];

    function __construct(User $model)
    {
        $this->model = $model;
    }

    public function count()
    {
        return User::count();
    }

    public function search($params)
    {
        $query = $this->model
            ->select('users.*');

        if(isset($params['search'])){
            $query->where('name', 'like', '%'.$params['search'].'%');
            $query->orWhere('last_name', 'like', '%'.$params['search'].'%');
            $query->orWhere('email', 'like', '%'.$params['search'].'%');
            $query->orWhere('phone', 'like', '%'.$params['search'].'%');
        }

        $query->where('id', '!=', Auth::user()->id);

        return $query->orderBy('created_at', 'desc');
    }

    public function countOfNewUsersPerMonth($from, $to)
    {
        $perMonthQuery = $this->getPerMonthQuery();

        $result = User::select([
            DB::raw("{$perMonthQuery} as month"),
            DB::raw('count(id) as count')
        ])
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('month')
            ->orderBy('month', 'ASC')->get();

        $data = [];
        foreach($result as $r){
            $data[$r['month']] = $r['count'];
        }
        $result = $data;

        $counts = [];

        foreach(range(1, 12) as $m) {
            $month = date('F', mktime(0, 0, 0, $m, 1));

            $month = $this->months[$month];

            $counts[$month] = isset($result[$m])
                ? $result[$m]
                : 0;
        }

        return $counts;
    }

    /**
     * Creates query that will be used to fetch users per
     * month, depending on type of the connection.
     *
     * @return string
     */
    private function getPerMonthQuery()
    {
        $connection = DB::connection();

        if ($connection instanceof SQLiteConnection) {
            return 'CAST(strftime(\'%m\', created_at) AS INTEGER)';
        }

        return 'MONTH(created_at)';
    }

    public function newUsersCount()
    {
        return User::whereBetween('created_at', [Carbon::now()->firstOfMonth(), Carbon::now()])
            ->count();
    }

    public function latest($count = 20)
    {
        return User::orderBy('created_at', 'DESC')
            ->limit($count)
            ->get();
    }
}