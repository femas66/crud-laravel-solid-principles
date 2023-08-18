<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentInterface;
use App\Models\Student;
use Illuminate\Database\QueryException;

class StudentRepository extends BaseRepository implements StudentInterface
{
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    public function store(array $data): mixed
    {
        try {
            $this->model->query()
                ->create($data);
            return true;
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] == 1452) return false;
        }
        return false;
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }

    public function update(mixed $id, array $data): mixed
    {
        try {
            $this->show($id)
                ->update($data);
        }catch (QueryException $exception) {
            if ($exception->errorInfo[1] == 1452) return false;
        }
        return true;
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
