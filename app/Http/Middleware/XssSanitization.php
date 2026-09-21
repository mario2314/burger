<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class XssSanitization
{
    // Field yang dikecualikan dari sanitasi
    protected array $except = [
        'password',
        'password_confirmation',
        'content', // blog content — dihandle Purifier di controller
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $input = $request->all();

        array_walk_recursive($input, function (&$value, $key) {
            if (!in_array($key, $this->except) && is_string($value)) {
                $value = strip_tags(trim($value));
            }
        });

        $request->merge($input);

        return $next($request);
    }
}