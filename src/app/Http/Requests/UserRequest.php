<?php

namespace App\Http\Requests;

class UserRequest extends Request
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return match ($this->route()) {
            'user.store', 'user.update' => [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'string'],
            ],
            default => [],
        };
    }
}
