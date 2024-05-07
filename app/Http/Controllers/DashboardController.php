<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Visitor;
use App\Models\Prisioner;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employeesCount = Employee::count();
        $visitorsCount = Visitor::count();
        $prisionersCount = Prisioner::count();
        $usersCount = User::count();

        $pieChartData = [
            'Funcionários' => $employeesCount,
            'Visitantes' => $visitorsCount,
            'Prisioneiros' => $prisionersCount,
            'Usuários' => $usersCount,
        ];

        return view('dashboard', compact('employeesCount', 'visitorsCount', 'prisionersCount', 'usersCount', 'pieChartData'));
    }
}