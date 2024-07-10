<?php

namespace App\Http\Controllers;

use App\Models\PremioSorteo;
use App\Http\Requests\StorePremioSorteoRequest;
use App\Http\Requests\UpdatePremioSorteoRequest;
use App\Http\Resources\PremioSorteoResource;
use Illuminate\Http\Request;

class PremioSorteoController extends Controller
{
    public function index()
    {
        return PremioSorteoResource::collection(PremioSorteo::all());
    }

    public function store(StorePremioSorteoRequest $request)
    {
        $premioSorteo = PremioSorteo::create($request->validated());
        return new PremioSorteoResource($premioSorteo);
    }

    public function show(PremioSorteo $premioSorteo)
    {
        return new PremioSorteoResource($premioSorteo);
    }

    public function update(UpdatePremioSorteoRequest $request, PremioSorteo $premioSorteo)
    {
        $premioSorteo->update($request->validated());
        return new PremioSorteoResource($premioSorteo);
    }

    public function destroy(PremioSorteo $premioSorteo)
    {
        $premioSorteo->delete();
        return response()->json(null, 204);
    }
}
