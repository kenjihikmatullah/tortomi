<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConvertResponseFieldsToCamelCase
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
        $response = $next($request);
        $content = $response->getContent();

        try {
            $json = json_decode($content, true);
            $replaced = [];
            $this->toCamel($json, $replaced);
            $response->setContent(json_encode($replaced));
        } catch (\Exception $e) {
            // you can log an error here if you want
        }

        return $response;
    }

    private function toCamel($old, &$new)
    {
        foreach ($old as $key => $value) {
            if (is_array($value)) {
                $newValue = [];
                $this->toCamel($value, $newValue);
                $new[Str::camel($key)] = $newValue;
            } else {
                $new[Str::camel($key)] = $value;
            }
        }
    }
}
