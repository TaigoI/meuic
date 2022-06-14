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
        $current_module = $disciplinas[0]->modulo;
        $colors = ["green", "aqua", "blue", "darkblue"];
        $random = rand(0,3);
    @endphp
    
    <div class="periodos-containers container">
        <h4 class="periodos_title">{{  $current_module}}</h4>
            <div class="row" style="margin-left: 40px; margin-right:40px;">
                @foreach ($disciplinas as $disciplina)
                    @if($disciplina->modulo == $current_module)
                    <div class="col-md-4 col-lg-3 pt-2 pb-3" id={{$disciplina->id_disciplina}}>
                        <div class="card dashboard-card slot-2 <?php echo $colors[rand(0,3)]?> ">
                            <h5 class="card-title">{{ $disciplina->name_disciplina }}</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>                                    
                    @else
                        </div>
                        </div>                                                      

                        @php
                            $current_module = $disciplina->modulo;
                        @endphp

                        <div class="periodos-containers container">
                            <h4 class="periodos_title">{{ $current_module }}</h4>
                            <div class="row" style="margin-left: 40px; margin-right:40px;">
                                <div class="col-md-4 col-lg-3 pt-2 pb-3">
                                    <div class="card dashboard-card slot-2 green">
                                        <h5 class="card-title">{{ $disciplina->name_disciplina }}</h5>                    
                                        <a class="stretched-link"></a>
                                    </div>
                                </div>
                            
        @endif
    @endforeach
</div>
</div> 



<!--carrossel 1º Periodo-->
<div class="periodos-containers container">
    <h4 class="periodos_title">1º período</h4>
    <div id="carrossel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row" style="margin-left: 40px; margin-right:40px;">
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 green">
                            <h5 class="card-title">Programação 1</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 aqua">
                            <h5 class="card-title">Lógica para computação</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 blue">
                            <h5 class="card-title">Computação, Sociedade e Ética</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 darkblue">
                            <h5 class="card-title">Matemática Discreta</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>                           
                </div>
            </div>

            <div class="carousel-item">
                <div class="row" style="margin-left: 40px; margin-right:40px;">
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 darkblue">
                            <h5 class="card-title">Cálculo Diferencial e Integral</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>   
                </div>
            </div>
        </div>

        <a style="width: max-content;" class="carousel-control-next pt-2 pb-3" href="#carrossel" role="button" data-slide="next" id="carousel-control">
            <span class="icon-md text-dark">navigate_next</span>                    
        </a>

        <a style="width: max-content;" class="carousel-control-prev pt-2 pb-3" href="#carrossel" role="button" data-slide="next" id="carousel-control">
            <span class="icon-md text-dark">navigate_before</span>                    
        </a>
    </div>
</div>

<!--2 PERIODO-->
<div class="periodos-containers container">
    <h4 class="periodos_title">2º período</h4>
    <div id="carrossel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row" style="margin-left: 40px; margin-right:40px;">
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 green">
                            <h5 class="card-title">Estrutura de Dados</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 green">
                            <h5 class="card-title">Banco de Dados</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 aqua">
                            <h5 class="card-title">Organização e Arquitetura de Computadores</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 darkblue">           
                            <h5 class="card-title">Geometria Analítica</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>                           
    
                </div>            
            </div>
        </div>
    </div>
</div>

<!--3 PERIODO-->
<div class="periodos-containers container">
    <h4 class="periodos_title">3º período</h4>
    <div id="carrossel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">						
                <div class="row" style="margin-left: 40px; margin-right:40px;">
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 aqua">
                            <h5 class="card-title">Redes de Computadores</h5>                    
                            <a class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 darkblue">
                    
                                <h5 class="card-title">Teoria dos Grafos</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 darkblue">
                    
                                <h5 class="card-title">Álgebra Linear</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 darkblue">
                    
                                <h5 class="card-title">Probabilidade e Estatística</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>                           
                </div>            
            </div>
        </div>
    </div>
</div>

<!--4 PERIODO-->
<div class="periodos-containers container">
    <h4 class="periodos_title">4º período</h4>
    <div id="carrossel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row" style="margin-left: 40px; margin-right:40px;">
    
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 darkblue">
                    
                                <h5 class="card-title">Projeto e Análise de Algoritmos</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>
    
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 aqua">
                    
                                <h5 class="card-title">Teoria da computação</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>
    
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 green">
                    
                                <h5 class="card-title">Programação 3</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>
    
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 green">
                    
                                <h5 class="card-title">Projeto de Software</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>                           
    
                </div>            
            </div>
        </div>
    </div>
</div>
    
<!--Ênfase Sistemas de Informação-->
<div class="container">
    <h4 class="periodos_title">Ênfase Sistemas de Informação</h4>
    <div id="carrossel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row" style="margin-left: 40px; margin-right:40px;">
    
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 blue">
                    
                                <h5 class="card-title">Interação Homem-Máquina</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>
    
                    <div class="col-md-4 col-lg-3 pt-2 pb-3">
                        <div class="card dashboard-card slot-2 green">
                    
                                <h5 class="card-title">Ciência de Dados</h5>                    
                                <a class="stretched-link"></a>
    
                        </div>
                    </div>                         
    
                </div>            
            </div>
        </div>
    </div>
</div>
@stop