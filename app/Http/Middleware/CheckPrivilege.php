<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPrivilege
{
    /**
     * Verificar si el usuario tiene el privilegio solicitado.
     */
    public function handle(
        Request $request,
        Closure $next,
        string $privilege
    ): Response {
        // Verificar que exista un usuario autenticado
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Verificar si el usuario tiene el privilegio
        if (!auth()->user()->hasPrivilege($privilege)) {
            abort(
                403,
                'No tienes permiso para realizar esta acción.'
            );
        }

        return $next($request);
    }
}