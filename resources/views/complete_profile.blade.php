@extends('basic_component')
@if(!Auth::user())
	redirect('/home');
@endif
@section('page content')
<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <i class="material-icons" style="font-size: 1.5em;">info</i>
            <strong>Deu certo!</strong> {{ session('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <i class="material-icons" style="font-size: 1.5em;">info</i>
            <strong>Deu ruim!</strong> {{ session('error') }}
        </div>
    @endif

    
    <div class="row align-items-center py-4">
        <div class="col-2" style="width: min-content;">
            <a type="button" class="btn btn-dark material-icons" disabled style="background: #212529 !important; opacity: 1 !important;" href="/">
                <i class="material-icons">arrow_back</i>
            </a>
        </div>
    </div>

    <div class="row" style="margin-top: 5%;">
        <div class="col">
            <div class="d-flex align-items-center flex-column justify-content-center">
                <div class="p-4">
                    <p style="font-size: 35px; margin-bottom: 0; font-family: 'Roboto Flex', monospace;">
                    @if (isset($page_title))
                        {{ $page_title["page_title"] }}
                    @else
                        Dados do perfil
                    @endif
                    </p>
                </div>
                <form method="POST" action="">
                    @csrf
                    <div class="p-2">                    
                        <div class="form-floating mb-4">
                            <input class="form-control rounded-pill inputsTexto" style="border-radius: 20px !important;" id="matriculaInput"
                                placeholder="usuario" value="{{Auth::user()->matricula}}" name="matriculaInput">
                            <label for="userInput" class="align-items-center" style="color: grey;">Matrícula/SIAPE</label>
                        </div>
                        <div class="form-floating professorCheckbox">
                            <div class="form-check">
                                @if (Auth::user()->teacher_status == 'ACCEPTED' or Auth::user()->teacher_status == 'REQUESTED')
                                <input class="form-check-input" style="border-color: #12E58D;" type="checkbox" name="teacherCheckbox" id="teacherCheckbox" checked="checked">
                                @else
                                <input class="form-check-input" style="border-color: #12E58D;" type="checkbox" name="teacherCheckbox" id="teacherCheckbox">
                                @endif

                                <label class="form-check-label" for="teacherCheckbox">
                                    Sou professor
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 d-flex justify-content-center">                    
                        <button class="buttonEntrar btn btn-primary " type="submit">
                            Enviar
                        </button>                 
                    </div>
                </form>
            </div>
        </div>
        <div class="col coluna2 justify-content-start" >
            <div class="d-flex flex-column">
                
                    <div class="row">
                        <div class="col align-items-center profilepicture col-3">                                    
                            <img class="rounded-circle m-auto" src="{{Auth::user()->picture}}"  width="110px" height="110px"  referrerpolicy="no-referrer">    
                        </div>
                        <div class="col" style="margin-top: 20px;">
                            <h6>Nome</h6>
                            <p id="nomeUser" class="fonteCorDiferente robotoFlex">{{Auth::user()->name}}</p>
                            <h6>Email</h6>
                            <p id="emailUser" class="fonteCorDiferente robotoFlex">{{Auth::user()->email}}</p>                                    
                        </div>
                    </div>                
            </div>
        </div>
    </div>
</div>
@stop