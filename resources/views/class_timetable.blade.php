@extends('basic_component')

@section('page content')
@include('partials/feedback_basic_alert')

<!--Body-->
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
			{{$disciplina->name_disciplina}}
		</h4>
	</div>
</div>

<div class="my-3 my-sm-5 row align-items-center">
	<div class="col-5 col-md-2">
		<div class="row timeslot slot-1	timeslot-horary">
			<div class="slot-card slot-card-1">
				<h4 class="material-icons">schedule</h4>
			</div>
		</div>

		@foreach($slots as $slot)
		<h5 class="row timeslot slot-1 timeslot-horary">
			{{$slot->display_name}}
		</h5>
		@endforeach
	</div>

	<div class="col-7 col-md-10">
		<div class="row flex-nowrap" style="overflow-x: scroll;">
			@foreach(array_keys($timetable) as $day)
			<div class="col-12 col-md">
				<div class="timeslot slot-1">
					<div class="slot-card slot-card-1 dark">
						<h4 class="timeslot-title">{{$dias->where('id_dia',$day)->first()->display_name}}</h4>
					</div>
				</div>

				@foreach($timetable[$day] as $slot)
				<div class="timeslot slot-{{$slot['size']}}">
					@if(array_key_exists('data',$slot))
					@foreach($slot['data'] as $data)
					<div
						class="slot-card slot-card-{{count($slot['data'])}} {{$data['color']}} {{ ($loop->index + 1 != count($slot['data'])) ? 'card-rightspace' : '' }}">
						@foreach($data['subslots'] as $subslot)
						<form class="slot-sub-form" method="POST"
							action="/book/{{$disciplina->id_disciplina}}/{{$data['monitor']}}/{{$day}}/{{$slot['i']+$loop->index}}">
							@csrf
							<button type="{{(!$subslot['past'] and !$subslot['booked']) ? 'submit' : 'button'}}"
								class="slot-card tip slot-sub{{$subslot['past'] ? ' past' : ($subslot['booked'] ? ' slot-sub-booked' : ($subslot['online'] ? ' slot-sub-online' : ''))}}">
								@if(array_key_exists('past',$subslot) and $subslot['past'])
								<span class="tiptext line-clamp-3"> Data Anterior </span>
								@elseif(array_key_exists('booked',$subslot) and $subslot['booked'])
								<span class="anti-tiptext icon-sm">
									lock_clock
								</span>
								<span class="tiptext line-clamp-3"> {{$subslot['booked']['topico']}} </span>
								@elseif(array_key_exists('online',$subslot) and $subslot['online'])
								<span class="anti-tiptext icon-sm">
									cloud
								</span>
								<span class="tiptext"> Somente Online </span>
								@endif
							</button>
						</form>
						@endforeach
					</div>
					@endforeach
					@endif
				</div>
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</div>

<form class="editarHorarioButtonDiv justify-content-end" style="margin-bottom: 100px; z-index: 10000;" action="/edit/timetable">
	<button class="editarHorarioButton btn rounded-pill white" type="submit">
		<div class="px-1">
			<div class="material-icons">
				edit
			</div>
		</div>
		&nbsp;Editar meu horario
	</button>
</form>
<!--End of Body-->
@stop