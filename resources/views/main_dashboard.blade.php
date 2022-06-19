@extends('basic_component')

@section('page content') 
    <div class="row align-items-center py-4">
        <div class="col-2" style="width: min-content;">
            <button type="button" class="btn btn-dark material-icons" disabled style="background: #212529 !important; opacity: 1 !important;">
                home
            </button>
        </div>
        <div class="col-10 col-md-11">
            <h4 class="m-0 mb-1 row discipline-name">
                Dashboard de Disciplinas
            </h4>
        </div>
    </div>

    @php
        $colors = ["green", "aqua", "blue", "darkblue"];
    @endphp

    @foreach($disciplinas->keys() as $modulo)
        <div class="periodos-containers container">
            <h4 class="periodos_title">{{ $modulo }}</h4>
                
                @php
                    $n_disciplinas = count($disciplinas[$modulo]->keys())
                @endphp

                <!-- Possui carrossel -->
                @if ($n_disciplinas > 4)

                    @php 
                        $i = 0;
                        $flag = true;
                        $carrossel_id = str_replace(' ', '', $modulo);
                    @endphp

                    <div id={{$carrossel_id}} class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">

                        @foreach($disciplinas[$modulo]->keys() as $id_disciplina)
                            @if ($i == 0 and $flag)
                                <div class="carousel-item active">
                                    <div class="row" style="margin-left: 40px; margin-right:40px;">
                                @php $flag = false; @endphp
                            @elseif ($i == 0 and !$flag)
                                <div class="carousel-item">
                                    <div class="row" style="margin-left: 40px; margin-right:40px;">
                            @endif
                                                     
                                <div class="col-md-4 col-lg-3 pt-2 pb-3" id={{$id_disciplina}}>
                                    <div class="card dashboard-card slot-2 <?php echo $colors[rand(0,3)]?> ">
                                        <h5 class="card-title">{{ $disciplinas[$modulo][$id_disciplina] }}</h5>                    
                                        <a class="stretched-link"></a>
                                    </div>
                                </div>
                                
                                @if (($i + 1) == 4)  
                                    @php $i = 0 @endphp
                                    </div> 
                                    </div> 
                                @else
                                    @php $i += 1 @endphp
                                @endif
                        @endforeach
                        
                        </div>
                        </div>
                        
                        <a style="width: max-content;" class="carousel-control-next pt-2 pb-3" href=#{{$carrossel_id}} role="button" data-slide="next" id={{$carrossel_id}}>
                            <span class="icon-md text-dark">navigate_next</span>                    
                        </a>

                        <a style="width: max-content;" class="carousel-control-prev pt-2 pb-3" href=#{{$carrossel_id}} role="button" data-slide="next" id={{$carrossel_id}}>
                            <span class="icon-md text-dark">navigate_before</span>                    
                        </a>

                        
                    </div>

                @else
                    <!-- Não possui carrossel -->
                    <div class="row" style="margin-left: 40px; margin-right:40px;">
                    @foreach($disciplinas[$modulo]->keys() as $id_disciplina)
                        <div class="col-md-4 col-lg-3 pt-2 pb-3" id={{$id_disciplina}}>
                            <div class="card dashboard-card slot-2 <?php echo $colors[rand(0,3)]?> ">
                                <h5 class="card-title">{{ $disciplinas[$modulo][$id_disciplina] }}</h5>                    
                                <a class="stretched-link"></a>
                            </div>
                        </div>
                    @endforeach
                    </div>

                @endif                 
        </div> 
        </div> 
    @endforeach           

@stop