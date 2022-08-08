<?php
namespace App\Repositories;

use App\Repositories\AbstractRepository\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
