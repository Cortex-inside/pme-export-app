<?php

namespace PMEexport\Criteria;

use Artesaos\Defender\Facades\Defender;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class UsersSelectCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class UsersEmpresaSelectCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if(Defender::is(['admin'])) {

            $model = $model
                ->selectRaw('users.*')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->whereIn('role_user.role_id', [7, 8])
                ->orderBy("users.id", "desc");

        } else {
            $model = $model
                ->selectRaw('users.*')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->whereIn('role_user.role_id', [7, 8])
                ->orderBy("users.id", "desc");
        }

        return $model;
    }
}
