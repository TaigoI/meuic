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

        <!--Form-->
        <div style="justify-content: center !important; margin-left: 25%;">
			<div class="formgroup" style="padding-left: 50px !important;">
				<div class="container" >
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
									<option value="" data-default disabled selected>Selecione</option>
										@foreach($lista_dias as $dia)
											@if (session()->has('dia') and $dia->id_dia == session()->get('dia'))  
											<option type="submit" value="{{ $dia->id_dia }}" selected>{{ $dia->display_name }}</option>
											@else
											<option type="submit" value="{{ $dia->id_dia }}">{{ $dia->display_name }}</option>                            
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

<!--
					<div class="row">
						<div class="form-floating mb-4">
							@if(isset($monitores))   
							<select class="form-select inputsTexto2 inputsTexto" id="inputMonitor" name="monitorSelect" onchange="document.forms['bookForm'].submit();" required>
								<option value="" data-default disabled selected>Escolha um monitor</option>                                        
								@foreach($monitores as $monitor)
									@if (session('discMonitor') != null and $monitor->id_aluno == session('discMonitor'))
									<option value={{ $monitor->id_aluno }} selected>{{ $monitor->name }}</option>   
									@else
									<option value={{ $monitor->id_aluno }}>{{ $monitor->name }}</option>   
									@endif
								@endforeach
							@else
							<select class="form-select inputsTexto2 inputsTexto" id="inputMonitor" disabled="disabled">
								<option value=""  selected>Escolha uma disciplina primeiro</option>
							@endif
							</select>
							<label for="inputMonitor" class="align-items-center labelInput" style="color: grey;">Monitor</label>
						</div>
					</div>

					<div class="row">
						<div style="width: 470px;">
							@include('partials/feedback_basic_alert')
						</div>
					</div>

					<div class="row">
						<div class="form-floating mb-4">    
							@if (session()->has('selectedDate'))
								@if ($horarios != null)
									@if (count($horarios) > 0)  
									<select class="form-select inputsTexto2 inputsTexto" id="inputGroupHorario" name="horarioSelect" onchange="document.forms['bookForm'].submit();">
										<option data-default disabled selected>Escolha um horário</option>  
										@foreach($horarios as $horario)     
											@if(session()->has('selectedSlot') and $horario->slot == session('selectedSlot'))                                                                           
												<option id="options" value={{ $horario->slot }} selected>{{ $horario->display_name }}</option> 
											@else               
												<option id="options" value={{ $horario->slot }}>{{ $horario->display_name }}</option> 
											@endif
										@endforeach
									</select>
									@else
									<input type="input" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" id="inputGroupHorario"
									value="Este monitor não possui horários na semana" disabled required>
									@endif
									<label for="inputGroupHorario" class="align-items-center labelInput" style="color: grey;">Horário</label>
								@endif
							@else
							<select class="form-select inputsTexto2 inputsTexto" id="inputGroupHorario" disabled="disabled">
								<option value="" selected>Escolha uma data primeiro</option>
							</select>
							<label for="inputGroupHorario" class="align-items-center labelInput" style="color: grey;">Horário</label>
							@endif  
						</div>
					</div>
					

					<div class="row">
						<div class="form-floating mb-4">
							<input type="input" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" id="inputTopicos"
							name="topicoInput" required>
							<label for="inputTopicos" class="align-items-center labelInput" style="color: grey;">Tópico</label>
						</div>
					</div>

					<div class="row">
						<div class="form-floating mb-4">
							<input type="input" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" id="inputAnotacoes"
							name="anotacoesInput">
							<label for="inputAnotacoes" class="align-items-center labelInput" style="color: grey;">Anotações</label>
						</div>
					</div>

					@if(session()->has('selectedSlot')) 
						@foreach($horarios as $horario)
							@if($horario->slot == session('selectedSlot') and $horario->modalidade == "online")
							<div class="row">
								<div class="form-floating mb-4">
									<div class="alert alert-secondary alertaLocal"  role="alert">
										<div class="container">
											<div class="row align-items-center">
												<div class="col col-lg-2">
													<span class="material-icons" style="color: #12E58D;">
														video_call
													</span>
												</div>
												<div class="col">
													O atendimento será realizado via:
													<a id="localAtendimento" style="font-weight: bold;">
														Google Meet
													</a>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							@endif
						@endforeach
					@endif
-->
					<div class="row">
						<div class="teste form-floating mb-4">
							<button  class="buttonAgendar btn btn-primary" type="submit" >
								Agendar
							</button>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>

@stop
