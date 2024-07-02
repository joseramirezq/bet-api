<?php
namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Http\Requests\StoreSuscripcionRequest;
use App\Http\Requests\UpdateSuscripcionRequest;
use App\Http\Resources\SuscripcionResource;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    public function index()
    {
        return SuscripcionResource::collection(Suscripcion::all());
    }

    public function store(StoreSuscripcionRequest $request)
    {
        $suscripcion = Suscripcion::create($request->validated());
        return new SuscripcionResource($suscripcion);
    }

    public function show(Suscripcion $suscripcion)
    {
        return new SuscripcionResource($suscripcion);
    }

    public function update(UpdateSuscripcionRequest $request, Suscripcion $suscripcion)
    {
        $suscripcion->update($request->validated());
        return new SuscripcionResource($suscripcion);
    }

    public function destroy(Suscripcion $suscripcion)
    {
        $suscripcion->delete();
        return response()->json(null, 204);
    }
}
