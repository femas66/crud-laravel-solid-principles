<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Models\Classroom;
    use Illuminate\Database\QueryException;
use Mockery\Exception;

class ClassroomRepository extends BaseRepository implements ClassroomInterface
{
    public function __construct(Classroom $classroom)
    {
        $this->model = $classroom;
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->with('students', 'school')
            ->get();
    }

    public function store(array $data): mixed
    {
        try {
            $this->model->query()
                ->create($data);
            return true;
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1452) {
                return false;
            }
        }
        return true;
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
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
