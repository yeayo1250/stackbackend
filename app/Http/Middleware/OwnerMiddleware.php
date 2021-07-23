<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $student = $request->route('student');

        if($student==null) {
            return response()->json(['message'=>'that student cannot be found'], 404);
        }

        if($student->user_id != auth()->user()->id) {
            return response()->json(['message'=>'you are the in the list.'], 401);
        }

        return $next($request);
    }
}
