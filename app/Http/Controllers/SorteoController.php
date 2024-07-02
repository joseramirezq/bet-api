<?php
namespace App\Http\Controllers;

use App\Models\Sorteo;
use App\Http\Requests\StoreSorteoRequest;
use App\Http\Requests\UpdateSorteoRequest;
use App\Http\Resources\SorteoResource;
use Illuminate\Http\Request;

class SorteoController extends Controller
{
    public function index()
    {
        return SorteoResource::collection(Sorteo::all());
    }

    public function store(StoreSorteoRequest $request)
    {
        $sorteo = Sorteo::create($request->validated());
        return new SorteoResource($sorteo);
    }

    public function show(Sorteo $sorteo)
    {
        return new SorteoResource($sorteo);
    }

    public function update(UpdateSorteoRequest $request, Sorteo $sorteo)
    {
        $sorteo->update($request->validated());
        return new SorteoResource($sorteo);
    }

    public function destroy(Sorteo $sorteo)
    {
        $sorteo->delete();
        return response()->json(null, 204);
    }
}
