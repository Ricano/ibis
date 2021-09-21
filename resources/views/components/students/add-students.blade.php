<div class="container createClass">
    <div class="row">
        <div class="card-body bg-white justify-content-center row p-5">
            <div class="row justify-content-between">
                <div>
                    <img src="{{asset('images/new-ibis.png')}}" alt="no_image">
                </div>
                <h4 class="meetingTitle">Adicionar Alunos</h4>
            </div>
            {{--<div class="container">--}}
            {{--    <div class="row justify-content-center">--}}
            {{--        <div class="col-md-8">--}}
            <div class="justify-content-center row">
                <div style="display: flex" class="card add-students-container">
                    <div class="mt-4 justify-content-center row">
                        <a href="{{url(Request::path() .'/add-student')}}">
                            <input type="button" style="width: 150px" class="btn btn-success" value="Manualmente">
                        </a>
                    </div>
                    <div class="mt-4 justify-content-center row">
                        <button type="button" style="width: 150px" class="btn btn-primary"  onclick="document.getElementById('input-formadores-ficheiro-r').click()">A partir de ficheiro</button>
                    </div>

                    <div id="sitio-do-botao-de-importar-r">
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif

                    <form id="form-de-importar-formadores-ficheiro-r" action="{{ url(Request::path() . '/import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group add-students-btns">
                            <input  id="input-formadores-ficheiro-r" type="file" accept=".xlsx" name="students" style="display:none; color: #929292; margin-left: 5px"  />
                        </div>
                    </form>

                </div>
            </div>
            <div class="mt-4 justify-content-center row">
                @component('components.button-voltar-a-turma', ['turma'=>$turma])
                @endcomponent
            </div>
        </div>
    </div>
</div>
