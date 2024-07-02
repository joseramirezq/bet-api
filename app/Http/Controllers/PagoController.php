<?php
namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use App\Http\Resources\PagoResource;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        return PagoResource::collection(Pago::all());
    }

    public function store(StorePagoRequest $request)
    {
        $pago = Pago::create($request->validated());
        return new PagoResource($pago);
    }

    public function show(Pago $pago)
    {
        return new PagoResource($pago);
    }

    public function update(UpdatePagoRequest $request, Pago $pago)
    {
        $pago->update($request->validated());
        return new PagoResource($pago);
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return response()->json(null, 204);
    }
}
