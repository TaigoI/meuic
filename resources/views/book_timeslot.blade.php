@extends('basic_component')

@section('page content')
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
				Agendamento de Horário
			</h4>
		</div>
	</div>

	<div style="justify-content: center !important; margin-left: 25%;">
		<div class="formgroup" style="padding-left: 50px !important;">
			<div class="container" >
				<!--Forms-->
				<form class="row" method="post" action="/book/disciplina">                              
					@csrf
					<div class="form-floating mb-4">
						<select class="form-select inputsTexto2 inputsTexto" id="disciplinaSelect" name="disciplina" onchange="this.form.submit()" required>
							<option value="" data-default disabled selected>Selecione</option>
							@foreach($lista_disciplinas as $disciplina)
								@if (session()->has('disciplina') and $disciplina->id_disciplina == session()->get('disciplina'))  
								<option type="submit" value="{{ $disciplina->id_disciplina }}" selected>{{ $disciplina->name_disciplina }}</option>
								@else
								<option type="submit" value="{{ $disciplina->id_disciplina }}">{{ $disciplina->name_disciplina }}</option>                            
								@endif
							@endforeach
						</select>
						<label for="disciplinaSelect" class="align-items-center labelInput" style="color: grey;">Disciplina</label>
					</div>                            
				</form>

				<form class="row" method="post" action="/book/{{session('disciplina')}}/monitor">                             
					@csrf
					<div class="form-floating mb-4">
						@if(session()->has('disciplina'))
							<select class="form-select inputsTexto2 inputsTexto" id="monitorSelect" name="monitor" onchange="this.form.submit()" required>
								<option value="" data-default disabled selected>Selecione</option>
									@foreach($lista_monitores as $monitor)
										@if (session()->has('monitor') and $monitor->id_aluno == session()->get('monitor'))  
										<option type="submit" value="{{ $monitor->id_aluno }}" selected>{{ App\Models\User::where('email', $monitor->id_aluno)->first()->name }}</option>
										@else
										<option type="submit" value="{{ $monitor->id_aluno }}">{{ App\Models\User::where('email', $monitor->id_aluno)->first()->name }}</option>                            
										@endif
									@endforeach
							</select>
						@else
							<select class="form-select inputsTexto2 inputsTexto" id="monitorSelect" disabled="disabled">
								<option value=""  selected>Escolha uma disciplina primeiro</option>
							</select>
						@endif
						<label for="monitorSelect" class="align-items-center labelInput" style="color: grey;">Monitor(a)</label>
					</div>                            
				</form>

				<form class="row" method="post" action="/book/{{session('disciplina')}}/{{session('monitor')}}/dia">                            
					@csrf
					<div class="form-floating mb-4">
						@if(session()->has('monitor'))
							<select class="form-select inputsTexto2 inputsTexto" id="diaSelect" name="dia" onchange="this.form.submit()" required>
								@if(!count($lista_dias))
									<option value="" data-default disabled selected>Não há dias disponíveis...</option>
								@else
									<option value="" data-default disabled selected>Selecione</option>
								@endif	

								@foreach($lista_dias as $dia)
									@if (session()->has('dia') and $dia->id_dia == session()->get('dia'))  
									<option type="submit" value="{{ $dia->id_dia }}" selected>{{date('d/m/Y', strtotime('+'.($dia->id_dia-date('w')).' days')) . ' ('.$dia->display_name.')'}}</option>
									@else
									<option type="submit" value="{{ $dia->id_dia }}">{{date('d/m/Y', strtotime('+'.($dia->id_dia-date('w')).' days')) . ' ('.$dia->display_name.')'}}</option>                            
									@endif
								@endforeach
								
							</select>
						@else
							<select class="form-select inputsTexto2 inputsTexto" id="diaSelect" disabled="disabled">
								@if(!session()->has('disciplina'))
									<option value="" selected>Escolha uma disciplina primeiro</option>
								@else
									<option value="" selected>Escolha um monitor primeiro</option>
								@endif
							</select>
						@endif
						<label for="diaSelect" class="align-items-center labelInput" style="color: grey;">Dia</label>
					</div>                            
				</form>

				<form class="row" method="post" action="/book/{{session('disciplina')}}/{{session('monitor')}}/{{session('dia')}}/slot">                            
					@csrf
					<div class="form-floating mb-4">
						@if(session()->has('dia'))
							<select class="form-select inputsTexto2 inputsTexto" id="slotSelect" name="slot" onchange="this.form.submit()" required>
								<option value="" data-default disabled selected>Selecione</option>
									@foreach($lista_slots as $slot)
										@if (session()->has('slot') and $slot->id_slot == session()->get('slot'))  
										<option type="submit" value="{{ $slot->id_slot }}" selected>{{ $slot->display_name }}</option>
										@else
										<option type="submit" value="{{ $slot->id_slot }}">{{ $slot->display_name }}</option>                            
										@endif
									@endforeach
							</select>
						@else
							<select class="form-select inputsTexto2 inputsTexto" id="slotSelect" disabled="disabled">
								@if(!session()->has('disciplina'))
									<option value="" selected>Escolha uma disciplina primeiro</option>
								@elseif(!session()->has('monitor'))
									<option value="" selected>Escolha um monitor primeiro</option>
								@else
									<option value="" selected>Escolha um dia primeiro</option>
								@endif
							</select>
						@endif
						<label for="slotSelect" class="align-items-center labelInput" style="color: grey;">Horário</label>
					</div>                            
				</form>

				<form class="pb-5" method="post" {{(isset($allow) and $allow) ? 'action=/book/'.session('disciplina').'/'.session('monitor').'/'.session('dia').'/'.session('slot').'/save' : ""}} onkeydown="return event.key != 'Enter';">  
					@csrf

					<div class="row">
						<div class="form-floating mb-4">
							<input type="input" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" id="inputTopico"
							name="topico" required>
							<label for="inputTopico" class="align-items-center labelInput" style="color: grey;">Assunto</label>
						</div>
					</div>

					<div class="row">
						<div class="form-floating mb-4">
							<input type="input" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" id="inputAnotacoes"
							name="anotacoes">
							<label for="inputAnotacoes" class="align-items-center labelInput" style="color: grey;">Anotações</label>
						</div>
					</div>

					@isset($horario_selecionado)
						<div class="row">
							<div class="form-floating mb-4">
								<div class="alert alert-secondary alertaLocal mb-0"  role="alert">
									<div class="row align-items-center" style="padding-right: 15px; padding-left: 5px;">
										<div class="col col-lg-2">
											<span class="icon-md text-green">
												{{($horario_selecionado->online) ? 'video_call' : 'pin_drop'}}
											</span>
										</div>
										<div class="col">
											<div class="row">
												<a id="localAtendimento" style="font-weight: bold; padding: 0px;">
													{{($horario_selecionado->online) ? 'Atendimento Online' : 'Atendimento Presencial'}}
												</a>
											</div>
											<div class="row">
												{{($horario_selecionado->online) ? 'Uma reunião Meet será adicionada ao evento Calendar' : 'Verifique diretamente com o monitor pelo evento Calendar'}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endisset

					<div class="row">
						<div class="teste form-floating mb-4">
							<button  class="buttonAgendar btn btn-primary green" type="submit" >
								Agendar
							</button>
						</div>
					</div>
				</form>
			</div>
        </div>
    </div>
@stop
