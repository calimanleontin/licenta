<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Admin {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $admin;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $admin
     * @return void
     */
    public function __construct(Guard $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->admin->guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('auth/login');
            }
        }
        if($this->admin->user()->is_admin() == false)
            return redirect('/')
                ->withErrors('403');

        return $next($request);
    }

}
