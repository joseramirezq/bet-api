<?php
namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Models\Pago;
use App\Http\Requests\StoreSuscripcionRequest;
use App\Http\Requests\UpdateSuscripcionRequest;
use App\Http\Resources\SuscripcionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuscripcionController extends Controller
{
    public function index()
    {
        $suscripciones = Suscripcion::with('usuario', 'pagos')->get();
        return SuscripcionResource::collection($suscripciones);
    }

    public function store(StoreSuscripcionRequest $request)
    {
        $suscripcion = DB::transaction(function () use ($request) {
            $suscripcion = Suscripcion::create($request->validated());

            Pago::create([
                'id_usuario' => $request->id_usuario,
                'id_suscripcion' => $suscripcion->id,
                'monto' => $request->monto_pagado,
                'fecha_pago' => now(),
                'metodo_pago' => $request->tipo_pago ?? 'default_method',
                'estado' => 1
            ]);

            return $suscripcion;
        });

        return new SuscripcionResource($suscripcion->load(['usuario', 'pagos']));
    }

    public function show(Suscripcion $suscripcion)
    {
        return new SuscripcionResource($suscripcion->load('usuario', 'pagos'));
    }

    public function update(UpdateSuscripcionRequest $request, Suscripcion $suscripcion)
    {
        $suscripcion = DB::transaction(function () use ($request, $suscripcion) {
            $suscripcion->update($request->validated());

            // Actualizar o crear el pago asociado
            Pago::updateOrCreate(
                ['id_suscripcion' => $suscripcion->id, 'id_usuario' => $request->id_usuario],
                [
                    'monto' => $request->monto_pagado,
                    'fecha_pago' => now(),
                    'metodo_pago' => $request->tipo_pago ?? 'default_method',
                    'estado' => 1
                ]
            );

            return $suscripcion;
        });

        return new SuscripcionResource($suscripcion->load(['usuario', 'pagos']));
    }

    public function destroy(Suscripcion $suscripcion)
    {
        $suscripcion->delete();
        return response()->json(null, 204);
    }

    protected function registrarPago($monto, $suscripcion)
    {
        Pago::create([
            'id_usuario' => $suscripcion->id_usuario,
            'id_suscripcion' => $suscripcion->id,
            'monto' => $monto,
            'fecha_pago' => now(),
            'metodo_pago' => 'default',  // Ajusta según tu lógica
            'estado' => 1,
        ]);
    }
    public function desactivar($id)
    {
        $usuario = Suscripcion::findOrFail($id);
        $usuario->estado = false;
        $usuario->save();
        return new SuscripcionResource($usuario);
    }
}