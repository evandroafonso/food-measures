<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * Get all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        $users = User::all();
        if($users == null){
            throw new CustomException("Nenhum usuário cadastrado na plataforma.");
        }
        return $users;
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

    public function create($data)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);
            DB::commit();
            return [
                'status' => true,
                'user' => $user,
                'message' => "Usuário cadastrado com sucesso!"
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new CustomException("Erro: Usuário não cadastrado.");
        }
    }

}
