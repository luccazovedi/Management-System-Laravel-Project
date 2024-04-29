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
        // Obtém os dados necessários do banco de dados
        $employeesCount = Employee::count();
        $visitorsCount = Visitor::count();
        $prisionersCount = Prisioner::count();
        $usersCount = User::count();

        // Prepara os dados para o gráfico de pizza
        $pieChartData = [
            'Funcionários' => $employeesCount,
            'Visitantes' => $visitorsCount,
            'Prisioneiros' => $prisionersCount,
            'Usuários' => $usersCount,
        ];

        // Retorna os dados para a view
        return view('dashboard', compact('employeesCount', 'visitorsCount', 'prisionersCount', 'usersCount', 'pieChartData'));
    }
}