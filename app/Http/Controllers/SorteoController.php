<?php
namespace App\Http\Controllers;

use App\Models\Sorteo;
use App\Models\PremioSorteo;
use App\Http\Requests\StoreSorteoRequest;
use App\Http\Requests\UpdateSorteoRequest;
use App\Http\Resources\SorteoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SorteoController extends Controller
{
    public function index()
    {
        $sorteos = Sorteo::with('premios')->get();
    return SorteoResource::collection($sorteos);
    }

    public function store(StoreSorteoRequest $request)
    {
        $sorteo = Sorteo::create($request->only('fecha_sorteo', 'estado', 'activo'));
        $sorteo->premios()->sync($request->premios); // Asignar premios al sorteo
        return new SorteoResource($sorteo->load('premios'));
    }

    public function show(Sorteo $sorteo)
    {
        return new SorteoResource($sorteo->load('premios'));
    }

    public function update(UpdateSorteoRequest $request, Sorteo $sorteo)
    {
        DB::transaction(function () use ($request, $sorteo) {
            $sorteo->update($request->validated());

            PremioSorteo::where('id_sorteo', $sorteo->id)->delete();

            foreach ($request->premios as $premioId) {
                PremioSorteo::create([
                    'id_sorteo' => $sorteo->id,
                    'id_premio' => $premioId,
                    'estado' => 1, // Estado activo por defecto
                ]);
            }
        });

        return new SorteoResource($sorteo->load('premios'));
    }


    public function destroy(Sorteo $sorteo)
    {
        $sorteo->delete();
        return response()->json(null, 204);
    }
}
