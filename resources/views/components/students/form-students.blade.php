
@if(Request::is('ibis/'. $group->id .'/students/add-student'))
    <div class="container createClass">
        <div class="row">
            <div class="card-body bg-white justify-content-center p-5 row">
                <div class="row justify-content-between">
                    <div>
                        <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                    </div>
                    <h4 class="meetingTitle">Adicionar um Aluno</h4>
                </div>
                <form action="{{url('ibis/'. $group->id .'/students')}}" method="POST" class="add-students-manually">
                    @csrf
                    <div class="form-group col">
                        <div>
                            <label for="student_number"><h4>Nr. do Aluno</h4></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control @error('student_number') is-invalid @enderror" id="student_number" name="student_number">
                        </div>
                        @error('student_number')
                        <span class="is-invalid" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <div>
                            <label for="student_name"><h4>Nome</h4></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="student_name" name="name">
                        </div>
                        @error('name')
                        <span class="is-invalid" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    {{--HIDDEN GROUP ID--}}
                    <input hidden type="text" name="group_id" value="{{ $group->id }}">
                    <input type="submit" class="btn btn-primary mb-3" value="Submeter">
                </form>
            </div>
        </div>
    </div>
@elseif(Request::is('ibis/'. $group->id .'/students/' . $student->id . '/info'))
    <div class="container createClass">
        <div class="row">
            <div class="card-body bg-white justify-content-center p-5 row">
                <div class="row justify-content-between">
                    <div>
                        <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                    </div>
                    <h4 class="meetingTitle">Editar um Aluno</h4>
                </div>
                <form action="{{url('ibis/students/'. $student->id )}}" method="POST" class="add-students-manually">
                    @csrf
                    @method('PUT')
                    <div class="form-group col">
                        <div>
                            <label for="student_number"><h4>Nr. do Aluno</h4></label>
                        </div>
                        <div class="">
                            <input disabled type="text" class="form-control @error('student_number') is-invalid @enderror"
                                   id="student_number" name="student_number" value="{{$student->student_number}}">
                        </div>
                        @error('student_number')
                        <span class="is-invalid" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <div>
                            <label for="student_name"><h4>Nome</h4></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="student_name" name="name" value="{{$student->name}}">
                        </div>
                        @error('name')
                        <span class="is-invalid" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    {{--HIDDEN GROUP ID--}}
                    <div class="u-info-buttons">
                        <input hidden type="text" name="group_id" value="{{ $student->group_id }}">
                        <input type="submit" class="btn btn-primary" value="Atualizar">
                        <button type="submit" class="btn btn-danger" form="eliminar-aluno">Eliminar</button>
                    </div>
                </form>

                <form action="{{url('ibis/students/'.$student->id)}}" id="eliminar-aluno" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
                @endif
            </div>
        </div>
    </div>
