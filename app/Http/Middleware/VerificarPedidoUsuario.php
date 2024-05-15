<?php

namespace App\Http\Middleware;

use App\Models\Pedido;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerificarPedidoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pedidoId = $request->route('id'); // Obtener el ID del pedido desde la ruta
        $user = Auth::user();

        // Verificar si el usuario autenticado es el propietario del pedido
        if ($user && $pedidoId) {
            $pedido = Pedido::findOrFail($pedidoId);

            if ($pedido->user_id !== $user->id) {
                // El usuario no tiene permiso para acceder a este pedido
                abort(401, 'Unauthorized');
            }
        }

        return $next($request);
    }
}
