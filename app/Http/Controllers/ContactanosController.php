<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){
        return view("emails.formularioContacto");
    }
    public function enviarFormulario(Request $request){
        $request->validate([
            'nombre'=>['required', 'string', 'min:5'],
            'contenido'=>['required', 'string', 'min:10'],
            'email'=>['required', 'email'],
        ]);
        $email=auth()->user()!=null ? auth()->user()->email : $request->email;
        try{
            Mail::to("aortizsalvador1998@gmail.com")
            ->send(new ContactanosMailable($request->nombre, $request->contenido, $email));
            return redirect()->route('home')->with('mensaje-success', 'Mensaje enviado');
        }catch(\Exception $ex){
            return redirect()->route('home')->with('mensaje-fail', 'No se pudo enviar el mensaje!!!');
        }
    }
}
