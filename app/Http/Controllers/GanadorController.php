<?php
namespace App\Http\Controllers;

use App\Models\Ganador;
use App\Http\Requests\StoreGanadorRequest;
use App\Http\Requests\UpdateGanadorRequest;
use App\Http\Resources\GanadorResource;
use Illuminate\Http\Request;

class GanadorController extends Controller
{
    public function index()
    {
        $ganadores = Ganador::with(['usuario', 'sorteo', 'premio'])->get();
        return GanadorResource::collection($ganadores);
    }

    public function store(StoreGanadorRequest $request)
    {
        $ganador = Ganador::create($request->validated());
        return new GanadorResource($ganador->load(['usuario', 'sorteo', 'premio']));
    }

    public function show(Ganador $ganador)
    {
        return new GanadorResource($ganador->load(['usuario', 'sorteo', 'premio']));
    }

    public function update(UpdateGanadorRequest $request, Ganador $ganador)
    {
        $ganador->update($request->validated());
        return new GanadorResource($ganador->load(['usuario', 'sorteo', 'premio']));
    }

    public function destroy(Ganador $ganador)
    {
        $ganador->delete();
        return response()->json(null, 204);
    }
}
