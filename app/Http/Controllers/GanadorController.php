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
        return GanadorResource::collection(Ganador::all());
    }

    public function store(StoreGanadorRequest $request)
    {
        $ganador = Ganador::create($request->validated());
        return new GanadorResource($ganador);
    }

    public function show(Ganador $ganador)
    {
        return new GanadorResource($ganador);
    }

    public function update(UpdateGanadorRequest $request, Ganador $ganador)
    {
        $ganador->update($request->validated());
        return new GanadorResource($ganador);
    }

    public function destroy(Ganador $ganador)
    {
        $ganador->delete();
        return response()->json(null, 204);
    }
}
