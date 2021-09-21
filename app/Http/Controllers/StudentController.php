<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Imports\StudentsImport;
use App\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('name', 'asc')->get();
        return view('pages.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = explode('/', \Illuminate\Support\Facades\Request::path());
        $turma = Group::find($url[1]);
        return view('pages.students.create', ['turma'=>$turma]);
    }

    public function createForm()
    {
        $path = explode('/', \Illuminate\Support\Facades\Request::path());
        $group = Group::find($path[1]);
        return view('pages.students.createForm', ['group'=>$group]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'group_id'          => 'required',
            'student_number'    => 'required|unique:students'
        ]);

        $student                  = new Student();
        $student->student_number  = $request->student_number;
        $student->name            = $request->name;
        $student->group_id        = $request->group_id;
        $student->save();

        return redirect('ibis/'.$student->group_id)->with('success', 'Aluno inserido');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Student $student)
    {
        return view('pages.students.show', ['student' => $student, 'group'=>$group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('pages.students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name'              => 'required',
//            'student_number'    => 'required'
        ]);

        $student = Student::findorfail($student->id);
//        $student->student_number  = $request->student_number;
        $student->name            = $request->name;
        $student->group_id        = $request->group_id;
        $student->save();

        return redirect('ibis/'.$student->group_id)->with('success', 'Perfil de Aluno atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student = Student::findorfail($student->id);
        $student->delete();
        return redirect('ibis/'.$student->group_id)->with('success', 'Aluno eliminado da turma!');
    }


    public function showImport()
    {
        return view('pages.import_students');
    }

    public function storeImport(Request $request)
    {
        $file = $request->file('students');

        try {
            $import = new StudentsImport;
            $import->import($file);
            $path = explode('/', \Illuminate\Support\Facades\Request::path());
            return redirect()->to('ibis/'.$path[1])->with('success', 'Alunos inseridos com sucesso');
        } catch (Exception $exception) {
            return redirect()->to('ibis/'.$path[1])->with('warning', 'Erro na importação de ficheiro');
        }
    }
}
