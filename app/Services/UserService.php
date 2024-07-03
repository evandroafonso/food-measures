<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Get all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return User::all();
    }
    /**
     * Get paginated users.
     *
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginatedUsers($perPage = 10)
    {
        return User::paginate($perPage);
    }

}
