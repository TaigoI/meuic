@extends('basic_component')
@if(!Auth::user())
	redirect('/home');
@endif
@section('page content')
    
@include('partials/feedback_basic_alert')
	
<div class="row align-items-center py-4">
	<div class="col-2" style="width: min-content;">
		<a href="/">
			<button type="button" class="btn btn-dark material-icons">
				arrow_back
			</button>
		</a>
	</div>
	<div class="col-10 col-md-11">
		<h4 class="m-0 mb-1 row discipline-name">
			Dados do perfil
		</h4>
	</div>
</div>

<div class="row my-2">
	<div class="col-5">
		<div class="d-flex align-items-center flex-column justify-content-center">
			<!--div class="p-4">
				<p style="font-size: 35px; margin-bottom: 0; font-family: 'Roboto Flex', monospace;">
				@if (isset($page_title))
					{{ $page_title["page_title"] }}
				@else
					Dados do perfil
				@endif
				</p>
			</div-->
			<form method="POST" action="/profile/update">
				@csrf
				<div class="p-2">
					<div class="form-floating mb-4">
						<input name="matricula" class="form-control rounded-pill inputsTexto" style="border-radius: 20px !important;" id="userInput"
							placeholder="usuario" value="{{Auth::user()->matricula}}">
						<label for="userInput" class="align-items-center" style="color: grey;">Matrícula/SIAPE</label>
					</div>
					<div class="form-floating professorCheckbox">
						<div class="form-check">
							@if(Auth::user()->teacher_status == "NO")
								<input name="checkbox" class="form-check-input" style="border-color: #12E58D;" type="checkbox" id="flexCheckDefault">
							@endif
							<label class="form-check-label" for="flexCheckDefault">
								{{Auth::user()->teacher_status == "NO"         ? "Solicitar perfil de professor"   : ''}}
								{{Auth::user()->teacher_status == "REQUESTED"  ? "Perfil de professor em análise"  : ''}}
								{{Auth::user()->teacher_status == "ACCEPTED"   ? "Perfil de professor aprovado"    : ''}}
								{{Auth::user()->teacher_status == "DENIED"     ? "Perfil de professor negado"      : ''}}
							</label>
						</div>
					</div>

				</div>
				
				<div style="display:flex;" class="p-2 justify-content-center">                    
					<button class="buttonEntrar btn btn-primary " type="submit">
						Atualizar
					</button>                 
				</div>               
			</form>
		</div>
	</div>
	<div class="col justify-content-start" >
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
@stop