<?php

namespace BuscaSorocaba\Http\Middleware;

use BuscaSorocaba\Repositories\UserRepository;
use Closure;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class CheckRole
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $id = Authorizer::getResourceOwnerId();
        $user = $this->repository->find($id);

        if($user->role != $role)
        {
            abort(403, 'Acesso Negado');
        }

        return $next($request);
    }
}
