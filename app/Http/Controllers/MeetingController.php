<?php

namespace App\Http\Controllers;

use App\Ata;
use App\Group;
use App\Meeting;
use App\MeetingStudent;
use App\MeetingType;
use App\Notifications\NewMeetingNotification;
use App\Observers\AtaObserver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use App\Student;
use App\Observers\MeetingObserver;
use App\Feedback;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function choose()
    {
        //tipos de reunião
        $tipos = DB::table('meeting_types')->get();


        //id da turma onde criar a reunião:
        $id =Route::input('group');

        //turma onde criar a reunião
        $turma = DB::table('groups')->get()->where('id',$id)->first();

        //coordenador da turma
        $coordenador = DB::table('users')->get()->where('id', $turma->user_id)->first();

        return view('pages.meetings.choose-meeting', [
            'tipos'=>$tipos,
            'coordenador'=>$coordenador,
            'turma'=>$turma
        ]);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group, $meetingType)
    {
        $tipo = MeetingType::where('id',$meetingType)->get()[0];
        // Todos os formadores da aplicação. Necessário ver se é suposto serem todos da aplicação ou todos da turma...
        $formadores  = DB::table('users')->get()->where('role_id','3');

        //id da turma onde criar a reunião:
        $id =Route::input('group');

        //turma onde criar a reunião
        $turma = DB::table('groups')->get()->where('id',$id)->first();

        //formadores da turma onde criar a reunião


        $formadoresDaTurma = User::whereHas('groups', function ($q) use ($id) {
            $q->where('group_id', $id);
        })->get();

        //   dd($formadores);


        //Alunos da turma
        $alunos = DB::table('students')->where('group_id','=',$id)->get();

        //coordenador da turma
        $coordenador = DB::table('users')->get()->where('id', $turma->user_id)->first();

        //tipos de reunião
        $tipos = DB::table('meeting_types')->get();

        //UFCD'S
        $ufcds = DB::table('ufcds')->get();

        $admins = User::where('role_id', 1)->get();

        $coordnArea = $admins->diff($formadoresDaTurma)->all();


        return view('pages.meetings.create-meeting', [ 'ufcds'=>$ufcds,'tipo'=>$tipo,'formadores'=>$formadores, 'coordenador'=>$coordenador, 'turma'=>$turma, 'alunos'=>$alunos, 'formadoresDaTurma'=>$formadoresDaTurma, 'coordnArea'=>$coordnArea]);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idTipoDeReunião = $request->tipo;
        $idTurma = $request->turma;

        $this->validate($request, [
            'turma'         => 'required',
            'tipo'          => 'required',
            'formadores'    => 'required',
            'alunos'        => 'required',
            'inicio'        => 'required|date',
            'fim'           => 'required|date|after_or_equal:inicio'
        ]);

        if($idTipoDeReunião == 2){
            $this->validate($request, [
                'ufcd'      => 'required',
            ]);
        }

        //Turma
        $turma = DB::table('groups')->where('id', $idTurma)->get()->first()->group_code;

        //horário
        $inicio = str_replace("T", " ", $request->inicio);
        $fim    = str_replace("T", " ", $request->fim);

        //Lista de formadores
        $formadores=[];
        foreach ($request->formadores as $formador){
            array_push($formadores,$formador );
        }

        //Lista de alunos
        $alunos = [];
        foreach ($request->alunos as $aluno){
            array_push($alunos,$aluno);
        }

        //Nova reunião
        $meeting                     = new Meeting();
        $meeting->start              = $inicio;
        $meeting->end                = $fim;
        $meeting->meeting_type_id    = $idTipoDeReunião;
        $meeting->coordinator_intro  = "";
        $meeting->save();

        //Preencher tabela pivot Meeting_User
        $meeting->users()->sync($formadores);
        //Preencher tabela pivot Meeting_Student
        $meeting->students()->sync($alunos);

        //Nova ata. Associada à nova reunião
        $ata                    = new Ata();
        $ata->data              = substr($inicio, 0, 10);
        $ata->plano_atividades  = "";
        $ata->anexos            = "";
        $ata->meeting_id        = $meeting->id;
        $ata->ufcd_id           = $request->ufcd;
        $ata->save();


        foreach ($formadores as $f) {
            User::find($f)->notify(new NewMeetingNotification($meeting));
        }

        return redirect('ibis/'.$idTurma)->with('success', 'Reunião com o ID: '.$meeting->id.', na turma '.$turma.' criada com sucesso!');
    }


    /**
     * Display the specified resource.
     *
     * @param Group $group
     * @param Meeting $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Meeting $meeting)
    {

        $reuniao = $meeting;
        $turma = $group;
        $coordenador = User::where('id', $group->user_id)->first();

        $alunosDaReuniao = Student::whereHas('meetings', function ($a) use ($reuniao) {
            $a->where('meeting_id', $reuniao->id);
        })->get();

        $formadoresDaReuniao = User::whereHas('meetings', function ($f) use ($reuniao) {
            $f->where('meeting_id', $reuniao->id);
        })->get();
        $ata = Ata::where('meeting_id', $meeting->id)->first();


        $totais = [];
        foreach ($formadoresDaReuniao as $f) {
            $count = 0;
            foreach ($alunosDaReuniao as $a) {

                $alunoReuniaoPivot = DB::table('meeting_student')->where('student_id', $a->id)->where('meeting_id', $reuniao->id)->get()->first();
                $formadorReuniaoPivot = DB::table('meeting_user')->where('user_id', $f->id)->where('meeting_id', $reuniao->id)->get()->first();

                $feedback = Feedback::where('meeting_user_id', $formadorReuniaoPivot->id)->where('meeting_student_id', $alunoReuniaoPivot->id)->get()->first();
                if ($feedback)
                    $count++;
            }
            $totais[$f->id]=$count;

            $totalPreenchidos =0;

            foreach ($totais as $t){
                $totalPreenchidos+=$t;
            }
        }





        return view('pages.meetings.show', [
            'reuniao' => $reuniao,
            'turma' => $turma,
            'coordenador' => $coordenador,
            'alunosDaReuniao' => $alunosDaReuniao,
            'formadoresDaReuniao' => $formadoresDaReuniao,
            'ata' => $ata,
            'totais' => $totais,
            'totalPreenchidos'=>$totalPreenchidos


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group ,Meeting $meeting)
    {
        $this->validate($request, [
            'analise'      => 'required',
        ]);

        $meeting->coordinator_intro        = $request->analise;
        $meeting->save();

        return redirect('ibis/'.$group->id.'/meetings/'.$meeting->id)->with('success', 'Análise Global Atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        //
    }

}
