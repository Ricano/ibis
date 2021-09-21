<?php

namespace App\Imports;

use App\Group;
use App\Student;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Request;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    use importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $group_id = explode('/', Request::path());
        return new Student([
            'student_number' => $row['numero'],
            'name' => $row['nome'],
            'group_id' => $group_id[1]
        ]);
    }

    public function rules(): array
    {
        return
            [
                '*.student_number' => ['student_number', 'unique:students,student_number']
            ];
    }
}
