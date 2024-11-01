<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    /**
     * Método ao ser adicionado, será executado antes qualquer execução de método do policies
     * Método para determinar um super acesso
     * @param \App\Models\User $user
     * @return bool|null
     */
    public function before(User $user)
    {
        if($user->name === 'SUPER'){
            return true;
        }
        return null; //Para que os demais métodos sejam verificados se não entrar na condição anterior, retornar null
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return ($user->role === 'admin' || $user->id === $post->user_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        // return $user->role !== 'visitor'; //Forma de validação sem a tabela user_permissions

        /**
         * Validando diretamente no banco de dados
         */
        // // get information from database (v2)
        // return $user->permissions()->where('permission', 'create_post')->exists();
        // // get information from database (v3)
        // return $user->permissions->contains('permission', 'create_post');

        /**
         * Validando diretamente na sessão
         */
        // // get information from session (v1)
        // foreach(Auth::user()->permissions as $permission) {
        //     if($permission->permission === 'create_post') {
        //         return true;
        //     }
        // }
        // return false;

        // --------------------------------------
        // definindo retornos de permissões com mensagens personalizadas
        if($user->permissions->contains('permission', 'create_post')){
            return Response::allow(); //Permitindo
        }
        return Response::denyWithStatus(403, 'Você não tem permissão para essa ação'); //Negando
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        // return $user->id === $post->user_id;
        return $user->permissions->contains('permission', 'update_post');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        // return $user->role === 'admin';
        return $user->permissions->contains('permission', 'delete_post');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return true;
    }
}
