<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('resources.users.index', ['users' => $this->userService->getUsers()]);
    }

    public function create()
    {
        //
    }

    public function store(UserRequest $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UserRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
