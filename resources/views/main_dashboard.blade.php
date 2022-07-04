@extends('basic_component')

@section('page content')
<div class="row align-items-center py-4">
	<div class="col-2" style="width: min-content;">
		<button type="button" class="btn btn-dark material-icons" disabled
			style="background: #212529 !important; opacity: 1 !important;">
			home
		</button>
	</div>
	<div class="col-10 col-md-11">
		<h4 class="m-0 mb-1 row discipline-name">
			Dashboard de Disciplinas
		</h4>
	</div>
</div>

@if(count($agendamentos->keys()))
<div class="periodos-containers container">
	<h4 class="periodos_title">Agendamentos</h4>
	<div id="agendamentos" class="carousel slide" data-ride="carousel" data-interval="false">
		<div class="carousel-inner">
			@foreach ($agendamentos->chunk(4) as $grupoAgendamentos)
			<div class="carousel-item{{$loop->index == 0 ? ' active' : ''}}">
				<div class="row" style="margin-left: 40px; margin-right:40px;">
					@foreach($grupoAgendamentos->keys() as $id)
					<div class="col-md-4 col-lg-3 pt-2 pb-3" id={{$id}}>
						<div class="slot-card slot-2 tip slot-sub dark">
							<h6 class="anti-tiptext line-clamp-2">{{ $agendamentos[$id]['agendamento']->topico }}</h6>
							<div class="tiptext row">
								<div class="col-12">
									@php
										$user = App\Models\User::where('email', $agendamentos[$id]['agendamento']->requerente)->first();
										$nome = explode(' ', $user->name);
										
										$primeiroNome = $nome[0];
										$ultimoNome = end($nome) != $primeiroNome ? end($nome) : '';
									@endphp
									<h7>{{' '.$primeiroNome.' '.$ultimoNome.' '}}</h7>
									<h7>(&commat;{{ str_replace('@ic.ufal.br','',$agendamentos[$id]['agendamento']->requerente) }})</h7>
								</div>
								<div class="col-12">
									<h7>Data: {{ date('d/m/Y',
										strtotime('+'.($agendamentos[$id]['horario']->id_dia-date('w')).' days')) }}
									</h7>
								</div>
								<div class="col-12">
									<h7>Horário: {{ App\Models\Slot::where('id_slot',
										$agendamentos[$id]['horario']->id_slot)->first()->display_name }}</h7>
								</div>
								<div class="col-12 line-clamp-3 pt-2">
									Anotações: <h7>{{ $agendamentos[$id]['agendamento']->anotacao }}</h7>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endforeach
		</div>
		@if(count($agendamentos->keys()) > 4)
		<a style="width: max-content;" class="carousel-control-next pt-2 pb-3" role="button" data-bs-slide="next"
			data-bs-target="#agendamentos" id="carousel-control-next">
			<span class="icon-md text-dark">navigate_next</span>
		</a>
		<a style="width: max-content;" class="carousel-control-prev pt-2 pb-3" role="button" data-bs-slide="prev"
			data-bs-target="#agendamentos" id="carousel-control-prev">
			<span class="icon-md text-dark">navigate_before</span>
		</a>
		@endif
	</div>
</div>
@endif

@foreach($disciplinas->keys() as $modulo)
<div class="periodos-containers container">
	<h4 class="periodos_title"> {{$modulo}} </h4>
	<div id="c-{{$loop->index}}" class="carousel slide" data-ride="carousel" data-interval="false">
		<div class="carousel-inner">
			@foreach ($disciplinas[$modulo]->chunk(4) as $grupoDisciplinas)
			<div class="carousel-item{{$loop->index == 0 ? ' active' : ''}}">
				<div class="row" style="margin-left: 40px; margin-right:40px;">
					@foreach($grupoDisciplinas as $disciplina)
					<div class="col-md-4 col-lg-3 pt-2 pb-3" id="{{$disciplina->id_disciplina}}">
						<div class="card dashboard-card slot-2 tip {{$disciplina->cor}}">
							<h5 class="card-title">{{ $disciplina->name_disciplina }}</h5>
							<a class="stretched-link" href="/timetable/{{$disciplina->id_disciplina}}"></a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endforeach
		</div>
		@if(count($disciplinas[$modulo]) > 4)
		<a style="width: max-content;" class="carousel-control-next pt-2 pb-3" role="button" data-bs-slide="next"
			data-bs-target="#c-{{$loop->index}}" id="carousel-control-next">
			<span class="icon-md text-dark">navigate_next</span>
		</a>
		<a style="width: max-content;" class="carousel-control-prev pt-2 pb-3" role="button" data-bs-slide="prev"
			data-bs-target="#c-{{$loop->index}}" id="carousel-control-prev">
			<span class="icon-md text-dark">navigate_before</span>
		</a>
		@endif
	</div>
</div>
@endforeach

@stop