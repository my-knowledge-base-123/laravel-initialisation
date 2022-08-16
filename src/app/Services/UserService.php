<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getPaginatedUserCollection(): AnonymousResourceCollection
    {
        $collection = $this->userRepository->all();

        Log::info('Get paginated user collection');

        // More business logic ...

        return UserResource::collection($collection);
    }
}
