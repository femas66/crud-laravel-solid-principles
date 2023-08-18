<?php

namespace App\Contracts\Repositories;
use App\Contracts\Interfaces\SchoolInterface;
use App\Models\School;
use Illuminate\Database\QueryException;

class SchoolRepository extends BaseRepository implements SchoolInterface
{
    public function __construct(School $school)
    {
        $this->model = $school;
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->with('classrooms')
            ->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)
            ->update($data);
    }

    public function delete(mixed $id): mixed
    {
        try {
            $this->show($id)
                ->delete();
            return true;
        }
        catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) return false;
        }
        return true;
    }
}
