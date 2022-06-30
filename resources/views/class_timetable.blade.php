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
				@foreach(array_keys($timetable) as $day)
					<div class="col-12 col-sm">
						<div class="row timeslot slot-1">
							<div class="slot-card slot-card-1 dark">
								<h4 class="timeslot-title">{{App\Models\Dia::where('id_dia',$day)->first()->display_name}}</h4>
							</div>
						</div>

						@foreach($timetable[$day] as $slot)
							<div class="row timeslot slot-{{$slot['size']}}">
								@if(array_key_exists('data',$slot))
									@foreach($slot['data'] as $data)
										<div class="slot-card slot-card-{{count($slot['data'])}} {{$data['color']}} {{ ($loop->index + 1 != count($slot['data'])) ? 'card-rightspace' : '' }}">
											@foreach($data['subslots'] as $subslot)
												<div class="slot-card tip slot-sub {{ (array_key_exists('booked',$subslot) and $subslot['booked']) ? 'slot-sub-booked' : '' }} {{ (array_key_exists('online',$subslot) and $subslot['online']) ? 'slot-sub-online' : '' }}">
													@if(array_key_exists('booked',$subslot) and $subslot['booked'])
														<span class="anti-tiptext icon-sm">
															lock_clock
														</span>
														<span class="tiptext"> {{$subslot['booked']['topico_agendamento']}} </span>
													@elseif(array_key_exists('online',$subslot) and $subslot['online'])
														<span class="anti-tiptext icon-sm">
															cloud	
														</span>
														<span class="tiptext"> Somente Online </span>
													@endif
												</div>
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
    <!--End of Body-->


    <!-- Modal -->
    <div class="modal fade meuModal" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content modal-border">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title" id="exampleModalScrollableTitle">Alterar meus horários</h4>
                    <form>
                        <div class="selectModal">
                            <h6>Segunda</h6>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>
                            <select class="form-select rounded-pill selectLocal" id="inputGroupHorario1">
                                <option selected>-</option>
                                <option value="1">Presencial</option>
                                <option value="2">Online</option>
                            </select>

                        </div>
                        <div class="selectModal" style="margin-top: 25px;">
                            <h6 style="margin-right: 20px;">Terça</h6>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>
                            <select class="form-select rounded-pill selectLocal" id="inputGroupHorario">
                                <option selected>-</option>
                                <option value="1">Presencial</option>
                                <option value="2">Online</option>
                            </select>
                        </div>
                        <div class="selectModal" style="margin-top: 25px;">
                            <h6 style="margin-right: 12px;">Quarta</h6>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>
                            <select class="form-select rounded-pill selectLocal" id="inputGroupHorario">
                                <option selected>-</option>
                                <option value="1">Presencial</option>
                                <option value="2">Online</option>
                            </select>
                        </div>
                        <div class="selectModal" style="margin-top: 25px;">
                            <h6 style="margin-right: 12px;">Quinta</h6>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>
                            <select class="form-select rounded-pill selectLocal" id="inputGroupHorario">
                                <option selected>-</option>
                                <option value="1">Presencial</option>
                                <option value="2">Online</option>
                            </select>
                        </div>
                        <div class="selectModal" style="margin-top: 25px;">
                            <h6 style="margin-right: 18px;">Sexta</h6>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>

                            <div class="rounded-pill inputHoraPill">
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="time" class="inputHoraEsquerda" id="dataInput">
                                    </div>
                                    -
                                    <div class="col">
                                        <input type="time" class="inputHoraDireita" id="dataInput">
                                    </div>
                                </div>

                            </div>
                            <select class="form-select rounded-pill selectLocal" id="inputGroupHorario">
                                <option selected>-</option>
                                <option value="1">Presencial</option>
                                <option value="2">Online</option>
                            </select>
                        </div>

                </div>

                <button type="submit" class="buttonEntrar buttonAlign btn btn-primary"
                    style="margin-bottom: 35px; margin-top: 10px;" type="button">
                    Salvar
                </button>

                </form>
            </div>
            </div>
        </div>
    </div>
    
    <div class="editarHorarioButtonDiv justify-content-end" style="margin-bottom: 100px ;">
        <button class="editarHorarioButton btn rounded-pill white" type="button" data-toggle="modal"
            data-target="#exampleModalScrollable">
            <div class="px-1">
                <div class="material-icons">
                    edit
                </div>
            </div>
            &nbsp;Editar meu horario
        </button>
    </div>
    <!--End of Modal-->
@stop