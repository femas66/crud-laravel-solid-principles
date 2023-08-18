<?php

namespace App\Contracts\Repositories;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public Model $model;
}
