<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqrs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\PqrsConfirmationMail;
use App\Mail\NewPqrsNotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class PqrsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth'); // Descomentar si solo usuarios autenticados pueden enviar PQRS
    }

    public function create()
    {
        return view('pqrs.pqrs_form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_pqrs' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'cedula' => 'nullable|string|max:20',
            'email_contacto' => 'nullable|email|max:255',
            'asunto' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'fecha_incidente' => 'nullable|date',
            'area' => 'nullable|string|max:255',
        ]);

        // Si el usuario no está autenticado, el email de contacto es obligatorio
        if (!Auth::check() && empty($validatedData['email_contacto'])) {
            return back()->withErrors(['email_contacto' => 'El correo electrónico de contacto es obligatorio si no ha iniciado sesión.'])->withInput();
        }

        // Generar el código de radicado único
        do {
            $radicadoCode = 'PQRS-' . Str::upper(Str::random(6)) . date('Ymd');
        } while (Pqrs::where('radicado_code', $radicadoCode)->exists());

        $pqrs = new Pqrs();
        $pqrs->tipo_pqrs = $validatedData['tipo_pqrs'];
        $pqrs->asunto = $validatedData['asunto'];
        $pqrs->descripcion = $validatedData['descripcion'];
        $pqrs->radicado_code = $radicadoCode;

        $pqrs->fecha_incidente = $validatedData['fecha_incidente'] ?? null;
        $pqrs->area = $validatedData['area'] ?? null;

        if (Auth::check()) {
            // Usuario autenticado
            $pqrs->user_id = Auth::id();
            $pqrs->contact_email = Auth::user()->email;
            $pqrs->contact_phone = Auth::user()->telefono;
            $pqrs->contact_cedula = Auth::user()->numero_identificacion;
        } else {
            // Usuario anónimo
            $pqrs->user_id = null;
            $pqrs->contact_email = $validatedData['email_contacto'];
            $pqrs->contact_phone = $validatedData['telefono'] ?? null;
            $pqrs->contact_cedula = $validatedData['cedula'] ?? null;
        }

        try {
            $pqrs->save();

            // Enviar confirmación al usuario (si hay un email de contacto)
            if ($pqrs->contact_email) {
                Mail::to($pqrs->contact_email)->send(new PqrsConfirmationMail($pqrs));
            }

            // Enviar notificación al equipo/administrador
            Mail::to(env('ADMIN_PQRS_EMAIL', 'tu_email@example.com'))->send(new NewPqrsNotificationMail($pqrs));

            return redirect()->back()->with('success', '¡Tu PQRS ha sido enviada exitosamente! Tu código de radicado es: ' . $radicadoCode . '. Revisa tu correo para la confirmación.');

        } catch (\Exception $e) {
            Log::error("Error al guardar PQRS o enviar correo: " . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Hubo un problema al procesar tu solicitud. Por favor, inténtalo de nuevo más tarde.')->withInput();
        }
    }
}
