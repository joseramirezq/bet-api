<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Suscripcion;
use App\Models\Ganador;
use App\Models\Sorteo;
use App\Models\Pago;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function getStatistics()
    {
        $usuarios = Usuario::where('estado', 1)->where('rol', 'usuario')->count();
        $suscripciones = Suscripcion::where('estado', 1)->count();
        $ganadores = Ganador::where('estado', 1)->count();
        $sorteos = Sorteo::where('activo', 1)->count();

        $pagosPorMes = Pago::where('estado', 1)
            ->whereYear('fecha_pago', Carbon::now()->year)
            ->selectRaw('MONTH(fecha_pago) as mes, SUM(monto) as total')
            ->groupBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        return response()->json([
            'usuarios' => $usuarios,
            'suscripciones' => $suscripciones,
            'ganadores' => $ganadores,
            'sorteos' => $sorteos,
            'pagosPorMes' => $pagosPorMes,
        ]);
    }
}
