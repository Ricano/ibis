<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Group;
use App\MeetingStudent;
use App\MeetingType;
use App\MeetingUser;
use App\Notifications\AllFeedbacksFilledNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Meeting;
use App\User;
use App\Student;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAlunos($group, $meeting, $student)
    {
        $turma = DB::table('groups')->where('id', $group)->get()->first();
        $reuniao = Meeting::where('id', $meeting)->get()->first();
        $aluno = DB::table('students')->where('id', $student)->get()->first();

        $formadoresNaReuniao = User::whereHas('meetings', function ($m) use ($meeting) {
            $m->where('meeting_id', $meeting);
        })->get();
        $alunoReuniaoPivot = DB::table('meeting_student')->where('student_id', $aluno->id)->where('meeting_id', $reuniao->id)->get()->first();

        // $feedbacks = Feedback::where('meeting_student_id', $alunoReuniaoPivot->id)->get();

        $coordenador = DB::table('users')->where('id', $turma->user_id)->get()->first();


        //dd($feedbacks);

        $feedbacks = [];
        foreach ($formadoresNaReuniao as $fr) {


            $formadorReuniaoPivot = DB::table('meeting_user')->where('user_id', $fr->id)->where('meeting_id', $reuniao->id)->get()->first();

            $feedback = Feedback::where('meeting_user_id', $formadorReuniaoPivot->id)->where('meeting_student_id', $alunoReuniaoPivot->id)->get()->first();

            $feedbacks[$fr->id]=$feedback;
        }



        return view('pages.feedbacks.index', [
            'turma' => $turma,
            'reuniao' => $reuniao,
            'aluno' => $aluno,
            'formadoresNaReuniao' => $formadoresNaReuniao,
            'coordenador' => $coordenador,
            'feedbacks' => $feedbacks
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFormadores($group, $meeting, $formador)
    {

        $turma = DB::table('groups')->where('id', $group)->get()->first();
        $reuniao = Meeting::where('id', $meeting)->get()->first();
        $formador = DB::table('users')->where('id', $formador)->get()->first();

        $alunosNaReuniao = Student::whereHas('meetings', function ($s) use ($meeting) {
            $s->where('meeting_id', $meeting);
        })->get();

        $coordenador = DB::table('users')->where('id', $turma->user_id)->get()->first();


        // dd($turma);


        return view('pages.feedbacks.index', [
            'turma' => $turma,
            'reuniao' => $reuniao,
            'formador' => $formador,
            'alunosNaReuniao' => $alunosNaReuniao,
            'coordenador' => $coordenador
        ]);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */


    public function store(Request $request, Group $group, Meeting $meeting)
    {

        $this->validate($request, [
            'feedback_aluno' => 'required',
            'formador' => 'required',
            'aluno' => 'required'
        ]);


        $meeting_user_id = DB::table('meeting_user')->where('meeting_id', $meeting->id)->where('user_id', $request->formador)->get()->first()->id;
        $meeting_student_id = DB::table('meeting_student')->where('meeting_id', $meeting->id)->where('student_id', $request->aluno)->get()->first()->id;

        $feedbackExistente = Feedback::where('meeting_user_id', $meeting_user_id)->where('meeting_student_id', $meeting_student_id)->get()->first();

        if ($feedbackExistente == null) {
            $feedback = new Feedback();
            $feedback->meeting_user_id = $meeting_user_id;
            $feedback->meeting_student_id = $meeting_student_id;
            $feedback->description = $request->feedback_aluno;
            $feedback->save();
        } else {
            $feedbackExistente->description = $request->feedback_aluno;
            $feedbackExistente->save();
        }

        if($this->tudoPreenchido($meeting)==true){
            User::find($group->user_id)->notify(new AllFeedbacksFilledNotification($meeting));
        }


        return redirect('ibis/' . $group->id . '/meetings/' . $meeting->id)->with('success', 'Feedback Atualizado');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }


    public function showAlunos($group, $meeting, $student, $teacher)
    {
        $reuniao = Meeting::where('id', $meeting)->get()->first();
        $turma = Group::where('id', $group)->get()->first();
        $aluno = Student::where('id', $student)->get()->first();
        $formador = User::where('id', $teacher)->get()->first();
//        $coordenador = DB::table('users')->where('id', $group->turma)->get()->first();
        $alunoReuniaoId = DB::table('meeting_student')->where('student_id', '=', $student, 'and', 'meeting_id', '=', $meeting)->get()->first()->id;
        $formadorReuniaoId = DB::table('meeting_user')->where('user_id', '=', $teacher, 'and', 'meeting_id', '=', $meeting)->get()->first()->id;
        //   dd($formadorReuniaoId);
        //   dd($alunoReuniaoId);
        //        dd($formador);
        //      dd($aluno);
// só  id? ou pivot toda?

        return view('pages.feedbacks.show', [
            'turma' => $turma,
            'aluno' => $aluno,
            'formador' => $formador,
            'reuniao' => $reuniao,
            'alunoReuniaoId' => $alunoReuniaoId,
            'formadorReuniaoId' => $formadorReuniaoId,
//            'coordenador' => $coordenador
        ]);


    }


    public function showFormadores(Feedback $feedback)
    {


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }

    private function tudoPreenchido(Meeting $meeting)
    {
        $reuniao = $meeting;

        $alunosDaReuniao = Student::whereHas('meetings', function ($a) use ($reuniao) {
            $a->where('meeting_id', $reuniao->id);
        })->get();
        $formadoresDaReuniao = User::whereHas('meetings', function ($f) use ($reuniao) {
            $f->where('meeting_id', $reuniao->id);
        })->get();


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
            $totais[$f->id] = $count;

            $totalPreenchidos = 0;

            foreach ($totais as $t) {
                $totalPreenchidos += $t;
            }
        }

        if (array_sum($totais) == sizeof($formadoresDaReuniao) * sizeof($alunosDaReuniao)) {
            return true;
        }
        return false;

    }
}

