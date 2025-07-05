<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('pages.contacto');
  }


  public function enviar(Request $request)
  {

    dd($request->all());
    $datos = $request->validate([
      'txtNombre' => 'required|string|max:255',
      'txtTelefono' => 'required|string|max:20',
      'txtEmail' => 'required|email',
      'txtAsunto' => 'required|string|max:255',
      'txtMensaje' => 'required|string',
    ]);

    Mail::send('emails.contacto', ['datos' => $datos], function ($message) use ($datos) {
      $message->to('aldosoria@gmail.com', 'Aldo Soria')
        ->subject('Nuevo mensaje de contacto: ' . $datos['txtAsunto']);
    });

    return back()->with('success', '¡Mensaje enviado correctamente!');
  }
}