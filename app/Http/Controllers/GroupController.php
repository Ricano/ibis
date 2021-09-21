<?php

namespace App\Http\Controllers;

use App\CourseType;
use App\Group;
use App\GroupType;
use App\GroupUser;
use App\Meeting;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function Matrix\add;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        $users = User::all();
        $teacher = User::with('groups')->where('id', Auth::user()->id)->first();

        $contagemReunioesAbertas = [];


        foreach ($groups as $group) {
            $contagem = 0;
            $reunioesVerificadas = [];
            foreach ($group->students as $student) {
                foreach ($student->meetings as $meeting) {

                    if (!array_key_exists($meeting->id, $reunioesVerificadas)) {


                        if ($meeting->ata[0]->impressa == 0) {

                            $reunioesVerificadas[$meeting->id] = true;

                            $contagem++;
                            break(1);
                        }
                    }

                }


            }
            $contagemReunioesAbertas[$group->id] = $contagem;
        }

        // dd($contagemReunioesAbertas);


        return view('pages.index', [
            'groups' => $groups,
            'users' => $users,
            'teacher' => $teacher,
            'contagemReunioesAbertas' => $contagemReunioesAbertas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group_codes = DB::table('groups')->select('group_code')->get();

        $courses = CourseType::all();

        $group_types = GroupType::all();
       // dd($group_codes);
        $users = User::orderBy('name')->get();

        return view('pages.classes.create-class', ['courses' => $courses, 'users' => $users, 'group_codes'=>$group_codes]);
    }

    public function createAjax($id)
    {
        $groups = DB::table('group_types')
            ->where('course_type_id', $id)->get();
        return json_encode($groups);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'group_code'    => 'required|unique:groups',
            'user_id'       => 'required',
            'group_type_id' => 'required',
            'center_cost'   => 'required'
        ]);

        $group = new Group();
        $group->group_code      = $request->group_code;
        $group->user_id         = $request->user_id;
        $group->group_type_id   = $request->group_type_id;
        $group->center_cost     = $request->center_cost;
        $group->save();

        $group->users()->sync($request->formadoresTurma);
        return redirect('ibis')->with('success', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $coordenador = User::where('id', $group->user_id)->first();
        $nome = $group->group_code;
        $curso = GroupType::where('id', $group->group_type_id)->first();
        $tipo = CourseType::where('id', $curso->course_type_id)->first()->name;
        $centro = $group->center_cost;
        $turma = $group;
        $alunos = DB::table('students')->where('group_id', $group->id)->get();

        //formadores da turma

        $f1 = DB::table('group_user')->where('group_id', $group->id)->get();
        $formadores = [];
        foreach ($f1 as $f) {
            $formador = DB::table('users')->where('id', $f->user_id)->get()->first();
            array_push($formadores, $formador);
        }

        //reuniões

        $alunosIds = [];
        foreach ($alunos as $id) {
            array_push($alunosIds, $id->id);
        }
        $alunoReuniao = DB::table('meeting_student')->whereIn('student_id', $alunosIds)->get();

        $reunioesIds = [];
        foreach ($alunoReuniao as $reuniao) {

            array_push($reunioesIds, $reuniao->meeting_id);
        }
        $reunioesIds = array_unique($reunioesIds);

        $reunioes = Meeting::all()->whereIn('id',  $reunioesIds);

        return view('pages.classes.show', [
            'coordenador' => $coordenador,
            'nome'        => $nome,
            'curso'       => $curso,
            'tipo'        => $tipo,
            'centro'      => $centro,
            'turma'       => $turma,
            'formadores'  => $formadores,
            'alunos'      => $alunos,
            'reunioes'    => $reunioes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $formadoresDaTurma = User::whereHas('groups', function ($f) use ($group) {
            $f->where('group_id', $group->id);
        })->get();

//        $formadoresNaAplicacao = User::where('role_id', 3)->get();
        $formadoresNaAplicacao = User::all();

        $formadoresForaDaTurma = $formadoresNaAplicacao->diff($formadoresDaTurma)->all();

        return view('pages.users.add-users-to-group', ['idDaTurma' => $group, 'formadoresDaTurma' => $formadoresDaTurma, 'formadoresForaDaTurma' => $formadoresForaDaTurma]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->users()->sync($request->NovosFormadoresTurma);

        return redirect('ibis/'.$group->id)->with('success', 'Formadores adicionados!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group = Group::findorfail($group->id);
        $group->delete();

        return redirect('ibis')->with('success', 'Turma eliminada!');
    }

    public function detach(Group $group, User $user)
    {
        $group->users()->detach($user);

        return redirect('ibis/'. $group->id)->with('success', 'Formador removido da turma');
//        return response()->json(['status' => 'Eliminado com sucesso!']);
    }
}
