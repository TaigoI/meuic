@extends('basic_component')

@section('page content')
@include('partials/feedback_basic_alert')

@php
session()->put('timetable', $timetable);
@endphp

<script type="text/javascript">

	function click(form)
	{
		form.action = "/what";
		return false;
	}

	function doubleClick(form) {
		console.log(form);
		return true;
	}

</script>

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
			Editar horário
		</h4>
	</div>
</div>

<div class="my-3 my-sm-5 row align-items-center">
	<div class="col-12 col-sm-2">
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

	<div class="col-12 col-sm-10">
		<div class="row">
			@foreach($dias as $dia)
			<div class="col-12 col-sm">
				<div class="row timeslot slot-1">
					<div class="slot-card slot-card-1 dark">
						<h4 class="timeslot-title">{{$dia->display_name}}</h4>
					</div>
				</div>

				@foreach($timetable[$dia->id_dia] as $slot)
				<div class="row timeslot slot-{{$slot['size']}}">
					<div class="slot-card slot-card-1 {{array_key_exists('color', $slot) ? $slot['color'] : ''}} {{array_key_exists('subslots',$slot) ? '' : 'p-0'}}">
						@if(array_key_exists('subslots',$slot))
							@foreach($slot['subslots'] as $subslot)
							<form class="slot-sub-form" method="POST" action="/edit/timetable/{{$dia->id_dia}}/{{$slot['i']+$loop->index}}">
								@csrf
								<button type="submit" class="slot-card tip slot-sub {{$subslot['booked'] ? ' slot-sub-booked' : ($subslot['online'] ? ' slot-sub-online' : '')}}">
									@if($subslot['booked'])
									<span class="anti-tiptext icon-sm">
										lock_clock
									</span>
									<span class="tiptext line-clamp-3"> Horário já agendado não pode ser alterado. </span>
									@elseif($subslot['online'])
									<span class="anti-tiptext icon-sm">
										cloud
									</span>
									<span class="tiptext"> Remover disponibilidade </span>
									@else
									<span class="tiptext"> Marcar como Online </span>
									@endif
								</button>
							</form>
							@endforeach
						@else
							@foreach(range(0,$slot['size']-1) as $subslot)
							<form class="slot-sub-form m-0" method="POST" action="/edit/timetable/{{$dia->id_dia}}/{{$slot['i']+$subslot}}">
								@csrf
								<button type='submit' class="slot-card tip slot-sub slot-sub-dark p-0">
									<span class="tiptext"> Adicionar disponibilidade </span>
								</button>
							</form>
							@endforeach
						@endif
					</div>
				</div>
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</div>
<!--End of Body-->
@stop