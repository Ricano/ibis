<?php

namespace App\Http\Controllers;

use App\Ata;
use App\Feedback;
use App\FeedbackFormador;
use App\FeedbackOrganizado;
use App\Group;
use App\Meeting;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AtaController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($groupId, $meetingId, $meetingTypeId)
    {
        $reuniao = Meeting::where('id', $meetingId)->first();


        if ($reuniao->meeting_type_id != $meetingTypeId) {
            return redirect('ibis')->with('warning', 'Algo não correu bem.');
        }

        $ata = Ata::where('meeting_id', $meetingId)->first();
        $turma = Group::where('id', $groupId)->first();

        $alunosDaReuniao = Student::whereHas('meetings', function ($a) use ($reuniao) {
            $a->where('meeting_id', $reuniao->id);
        })->get();
        $formadoresDaReuniao = User::whereHas('meetings', function ($f) use ($reuniao) {
            $f->where('meeting_id', $reuniao->id);
        })->get();
        $coordenador = User::where('id', $turma->user_id)->first();

        if($meetingTypeId==2){

            $anoReuniao = $reuniao->start[0] . $reuniao->start[1] . $reuniao->start[2] . $reuniao->start[3];
            $diaReuniao = $reuniao->start[8] . $reuniao->start[9];
            $diaReuniao = $diaReuniao[0] == '0' ? $diaReuniao[1] : $diaReuniao;
            $numeroMesReuniao = $reuniao->start[5] . $reuniao->start[6];
            $mesReuniao = $this->nomeDoMes($numeroMesReuniao);
            $anoTurma = '20' . $turma->group_code[strlen($turma->group_code) - 2] . $turma->group_code[strlen($turma->group_code) - 1];
            $numeroMesTurma = $turma->group_code[strlen($turma->group_code) - 4] . $turma->group_code[strlen($turma->group_code) - 3];
            $mesTurma = $this->nomeDoMes($numeroMesTurma);


            return view('pages.atas.create-ata', [
                'reuniao' => $reuniao,
                'ata' => $ata,
                'turma' => $turma,
                'anoReuniao' => $anoReuniao,
                'diaReuniao' => $diaReuniao,
                'mesReuniao' => $mesReuniao,
                'mesTurma' => $mesTurma,
                'anoTurma' => $anoTurma,
                'coordenador' => $coordenador,
                'alunosDaReuniao' => $alunosDaReuniao,
                'formadoresDaReuniao' => $formadoresDaReuniao
            ]);

        }



        $feedbacks = [];


        foreach ($alunosDaReuniao as $aluno) {

            $alunoReuniaoPivot = DB::table('meeting_student')->where('student_id', $aluno->id)->where('meeting_id', $reuniao->id)->get()->first();



            $feedbackOrganizado             = new FeedbackOrganizado();
            $feedbackOrganizado->aluno      = Student::where('id', $alunoReuniaoPivot->student_id)->get()->first();

            foreach ($formadoresDaReuniao as $formador) {

                $formadorReuniaoPivot = DB::table('meeting_user')->where('user_id', $formador->id)->where('meeting_id', $reuniao->id)->get()->first();
                $feedback = Feedback::where('meeting_user_id', $formadorReuniaoPivot->id)->where('meeting_student_id', $alunoReuniaoPivot->id)->get()->first();

                $feedbackFormador = new FeedbackFormador();
                $feedbackFormador->formador= User::where('id', $formadorReuniaoPivot->user_id)->get()->first();
                $feedbackFormador->feedback = $feedback;

                $feedbackOrganizado->feedbacksFormadores[$feedbackFormador->formador->id] = $feedbackFormador;


            }
            if(!in_array($feedbacks, [$feedbackOrganizado], true)){
                array_push($feedbacks, $feedbackOrganizado);
            }


        }
        //                     dd($feedbacks);
        return view('pages.atas.create-ata', [
            'reuniao' => $reuniao,
            'ata' => $ata,
            'turma' => $turma,
            'coordenador' => $coordenador,
            'alunosDaReuniao' => $alunosDaReuniao,
            'formadoresDaReuniao' => $formadoresDaReuniao,
            'feedbacks'         => $feedbacks
        ]);


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeRecuperacao($groupId, $meetingId, Request $request)
    {
        $reuniao = Meeting::where('id', $meetingId)->first();

        $textoPorFormatar = $request->textoRecuperacao;
//formatar texto
        $textoFormatado = str_replace("Nada mais havendo a tratar deu", "&Nada mais havendo a tratar deu", (str_replace("Após a", "&Após a", (str_replace("A reunião teve c", "&A reunião teve c", (str_replace(" . O formando", ". O formando", (str_replace(" , de ", ", de ", (str_replace(" , de ", ", de ", (str_replace(" , sob a", ", sob a", (str_replace(" , do ano", ", do ano", (preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', (str_replace("\r\n", "", (str_replace(" Gravar ata", "", $textoPorFormatar)))))))))))))))))))));

//adicionar texto à reunião se a ata não tiver sido marcada como completa
        if ($reuniao->coordinator_intro == "") {

            $reuniao->coordinator_intro = $textoFormatado;
            $reuniao->save();
        } else
            return redirect('ibis/')->with('warning', 'Algo não correu bem');

        // marcar a ata como completa
        $ata = $reuniao->ata->first();
        $ata->impressa = true;
        $ata->save();


        return redirect('ibis/' . $groupId . '/meetings/' . $reuniao->id . '/ata-recuperacao')->with('success', 'Ata criada com sucesso!');

    }

    public function storePedagogica($groupId, $meetingId, Request $request)
    {

        $reuniao = Meeting::where('id', $meetingId)->first();
        $ata = $reuniao->ata->first();
        if (strval($ata->id) !== $request->idDaAta || $ata->impressa)
            return redirect('ibis/')->with('warning', 'Algo não correu bem');

        $turma = Group::where('id', $groupId)->first();


        // marcar a ata como completa
        $ata->impressa = true;
        $ata->save();


        return redirect('ibis/' . $groupId . '/meetings/' . $reuniao->id . '/ata-pedagogica')->with('success', 'Ata criada com sucesso!');

    }



    public function getPdf($groupId, $meetingId)
    {


        $ata = Ata::where('meeting_id', $meetingId)->first();
        $reuniao = Meeting::where('id', $meetingId)->first();
        $turma = Group::where('id', $groupId)->first();


        if ($reuniao->meeting_type_id == 2) {
            $texto = $reuniao->coordinator_intro;
            $texto = explode("&", $texto);
            $coordenador=User::where('id',$turma->user_id)->first();
            $pdf = PDF::loadView('ata-recuperacao', [
                'reuniao' => $reuniao,
                'turma' => $turma,
                'coordenador' =>$coordenador,
                'texto' => $texto
            ]);
            return $pdf->download($turma->group_code.'-ata-recuperacao-'.explode(' ',$reuniao->students[0]->name)[0].'-'.explode(' ',$reuniao->students[0]->name)[sizeof(explode(' ',$reuniao->students[0]->name))-1].'-'.$ata->data.'.pdf');
        }

        $alunosDaReuniao = Student::whereHas('meetings', function ($a) use ($reuniao) {
            $a->where('meeting_id', $reuniao->id);
        })->get();
        $formadoresDaReuniao = User::whereHas('meetings', function ($f) use ($reuniao) {
            $f->where('meeting_id', $reuniao->id);
        })->get();

        $feedbacks = [];
        foreach ($alunosDaReuniao as $aluno) {
            $alunoReuniaoPivot = DB::table('meeting_student')->where('student_id', $aluno->id)->where('meeting_id', $reuniao->id)->get()->first();

            $feedbackOrganizado = new FeedbackOrganizado();
            $feedbackOrganizado->aluno = Student::where('id', $alunoReuniaoPivot->student_id)->get()->first();

            foreach ($formadoresDaReuniao as $formador) {

                $formadorReuniaoPivot = DB::table('meeting_user')->where('user_id', $formador->id)->where('meeting_id', $reuniao->id)->get()->first();
                $feedback = Feedback::where('meeting_user_id', $formadorReuniaoPivot->id)->where('meeting_student_id', $alunoReuniaoPivot->id)->get()->first();

                $feedbackFormador = new FeedbackFormador();
                $feedbackFormador->formador = User::where('id', $formadorReuniaoPivot->user_id)->get()->first();
                $feedbackFormador->feedback = $feedback;

                $feedbackOrganizado->feedbacksFormadores[$feedbackFormador->formador->id] = $feedbackFormador;

            }
            if (!in_array($feedbacks, [$feedbackOrganizado], true)) {
                array_push($feedbacks, $feedbackOrganizado);
            }

        }



        $pdf = PDF::loadView('ata-pedagogica', ['reuniao' => $reuniao,
            'turma' => $turma,
            'reuniao' => $reuniao,
            'ata' => $ata,
            'alunosDaReuniao' => $alunosDaReuniao,
            'formadoresDaReuniao' => $formadoresDaReuniao,
            'feedbacks' => $feedbacks

        ]);

        return $pdf->download($turma->group_code.'-ata-pedagogica-'.$ata->data.'.pdf');


    }

    public function getAta($groupId, $meetingId)
    {

        $reuniao = Meeting::where('id', $meetingId)->first();

        if(!$reuniao->ata[0]->impressa){

            return redirect('ibis')>with('warning', 'Algo não correu bem.');
        }

        if ($reuniao->meetingtype->id == 2) {

            return redirect('ibis/' . $groupId . '/meetings/' . $reuniao->id . '/ata-recuperacao');
        }

        return redirect('ibis/' . $groupId . '/meetings/' . $reuniao->id . '/ata-pedagogica');


    }
    /**
     * Display the specified resource.
     *
     * @param \App\Ata $ata
     * @return \Illuminate\Http\Response
     */
    public function showRecuperacao($groupId, $meetingId)
    {
        $reuniao = Meeting::where('id', $meetingId)->first();
        $turma = Group::where('id', $groupId)->first();

        $texto = $reuniao->coordinator_intro;

        $texto = explode("&", $texto);
        $coordenador=User::where('id',$turma->user_id)->first();


        return view('pages.atas.show-ata-recuperacao', [
            'reuniao' => $reuniao,
            'turma' => $turma,
            'coordenador'=>$coordenador,
            'texto' => $texto
        ]);


    }

    public function showPedagogica($groupId, $meetingId)
    {
        $reuniao = Meeting::where('id', $meetingId)->first();
        $ata = Ata::where('meeting_id', $meetingId)->first();
        $turma = Group::where('id', $groupId)->first();

        $alunosDaReuniao = Student::whereHas('meetings', function ($a) use ($reuniao) {
            $a->where('meeting_id', $reuniao->id);
        })->get();
        $formadoresDaReuniao = User::whereHas('meetings', function ($f) use ($reuniao) {
            $f->where('meeting_id', $reuniao->id);
        })->get();

        $feedbacks = [];
        foreach ($alunosDaReuniao as $aluno) {
            $alunoReuniaoPivot = DB::table('meeting_student')->where('student_id', $aluno->id)->where('meeting_id', $reuniao->id)->get()->first();
            $feedbackOrganizado = new FeedbackOrganizado();
            $feedbackOrganizado->aluno = Student::where('id', $alunoReuniaoPivot->student_id)->get()->first();

            foreach ($formadoresDaReuniao as $formador) {
                $formadorReuniaoPivot = DB::table('meeting_user')->where('user_id', $formador->id)->where('meeting_id', $reuniao->id)->get()->first();
                $feedback = Feedback::where('meeting_user_id', $formadorReuniaoPivot->id)->where('meeting_student_id', $alunoReuniaoPivot->id)->get()->first();

                $feedbackFormador = new FeedbackFormador();
                $feedbackFormador->formador = User::where('id', $formadorReuniaoPivot->user_id)->get()->first();
                $feedbackFormador->feedback = $feedback;

                $feedbackOrganizado->feedbacksFormadores[$feedbackFormador->formador->id] = $feedbackFormador;

            }
            if (!in_array($feedbacks, [$feedbackOrganizado], true)) {
                array_push($feedbacks, $feedbackOrganizado);
            }
        }


        return view('pages.atas.show-ata-pedagogica', [
            'reuniao' => $reuniao,
            'turma' => $turma,
            'ata' => $ata,
            'feedbacks' => $feedbacks,
            'alunosDaReuniao' => $alunosDaReuniao,
            'formadoresDaReuniao' => $formadoresDaReuniao
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Ata $ata
     * @return \Illuminate\Http\Response
     */
    public function edit(Ata $ata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Ata $ata
     * @param Group $group
     * @param Meeting $meeting
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateAtividades(Request $request, Group $group, Meeting $meeting)
    {

        $this->validate($request, [
            'p_atividades' => 'required'
        ]);
        $ata = Ata::where('meeting_id', $meeting->id)->get()->first();

        $ata->plano_atividades = $request->p_atividades;
        $ata->save();

        return redirect('ibis/' . $group->id . '/meetings/' . $meeting->id)->with('success', 'Plano de Atividades Guardado');
    }

    public function updateLocal(Request $request, Group $group, Meeting $meeting)
    {

        $this->validate($request, [
            'local' => 'required'
        ]);
        $ata = Ata::where('meeting_id', $meeting->id)->get()->first();

        $ata->local = $request->local;
        $ata->save();

        return redirect('ibis/' . $group->id . '/meetings/' . $meeting->id)->with('success', 'Localização Atualizada');
    }


    public function updateAnexos(Request $request, Group $group, Meeting $meeting)
    {

        $this->validate($request, [
            'anexos' => 'required'
        ]);
        $ata = Ata::where('meeting_id', $meeting->id)->get()->first();

        $ata->anexos = $request->anexos;
        $ata->save();

        return redirect('ibis/' . $group->id . '/meetings/' . $meeting->id)->with('success', 'Anexos Atualizados');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Ata $ata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ata $ata)
    {
        //
    }

    private function nomeDoMes(string $numeroDoMes)
    {

        $mes = '';
        switch ($numeroDoMes) {
            case '01':
            {
                $mes = 'janeiro';
                break;
            }
            case '02':
            {
                $mes = 'fevereiro';
                break;
            }
            case '03':
            {
                $mes = 'março';
                break;
            }
            case '04':
            {
                $mes = 'abril';
                break;
            }
            case '05':
            {
                $mes = 'maio';
                break;
            }
            case '06':
            {
                $mes = 'junho';
                break;
            }
            case '07':
            {
                $mes = 'julho';
                break;
            }
            case '08':
            {
                $mes = 'agosto';
                break;
            }
            case '09':
            {
                $mes = 'setembro';
                break;
            }
            case '10':
            {
                $mes = 'outubro';
                break;
            }
            case '11':
            {
                $mes = 'novembro';
                break;
            }
            case '12':
            {
                $mes = 'dezembro';
                break;
            }
        }
        return $mes;

    }
}
