<?php
namespace App\Http\Controllers;

use App\Models\Premio;
use App\Http\Requests\StorePremioRequest;
use App\Http\Requests\UpdatePremioRequest;
use App\Http\Resources\PremioResource;
use Illuminate\Http\Request;

class PremioController extends Controller
{
    public function index()
    {
        return PremioResource::collection(Premio::all());
    }

    public function store(StorePremioRequest $request)
    {
        $premio = Premio::create($request->validated());
        return new PremioResource($premio);
    }

    public function show(Premio $premio)
    {
        return new PremioResource($premio);
    }

    public function update(UpdatePremioRequest $request, Premio $premio)
    {
        $premio->update($request->validated());
        return new PremioResource($premio);
    }

    public function destroy(Premio $premio)
    {
        $premio->delete();
        return response()->json(null, 204);
    }
}
