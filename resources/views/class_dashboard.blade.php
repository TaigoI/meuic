@extends('basic_component')

@section('page content')

@php
 

 
$listaMeses = array();

foreach ($listaAtvs as $lista){
   
   $mes = ucfirst($lista->mes_atividade);
   $ano = $lista->ano_atividade;
   $mes_ano = $mes." ".$ano;

   if (array_key_exists($mes_ano,$listaMeses)){

       $listaMeses[$mes_ano][count($listaMeses[$mes_ano])+1] = $lista;
   }else{
       $listaMeses[$mes_ano] = [];
       $listaMeses[$mes_ano][0] = $lista;

   }
};

@endphp

<div class="container page-container"> 
        <div class="row align-items-center py-4">
            <div class="col-2" style="width: min-content;">
                <a href="/home">
                    <button type="button" class="btn btn-dark material-icons">
                        arrow_back
                    </button>
                </a>
            </div>
            <div class="col-10 col-md-11">
                <!-- Tratar o retorno do save e jogar aqui -->
                
                <h4 class="m-0 mb-1 row discipline-name">
                    Atividades 
                </h4>
                

            </div>
            
            
        </div>
        <div class="row d-flex justify-content-end">
            <div class=" col-md-2 " style="padding-bottom: 15px;">
                    <button class="btn main-button blue " type="button" data-toggle="modal" data-target="#registraAtividadeModal">
                        <div class="icon-sm">
                            event
                        </div>
                        Registrar Atividades
                    </button>
            </div>
        </div>
        
        <!-- Dropdowns de professor -->
        @if(Auth::user()->role == 'T')
        <div class="row align-items-top">
            <div class="col-12 col-md-5">
                <div class="form-floating mb-4">
                    <select class="form-select slot-1 dropdown" id="inputGroupDisciplina">
                        <option value="1" selected>Programação 1</option>
                        <option value="2">Estrutura de Dados</option>
                        <option value="3">Projeto e Análise de Algoritmos</option>
                    </select>
                    <label for="inputGroupDisciplina" class="align-items-center labelInput">Disciplina</label>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="form-floating mb-4">
                    <select class="form-select slot-1 dropdown" id="inputGroupMonitor">
                        <option value="1" selected> Sônia </option>
                        <option value="2"> Letícia </option>
                        <option value="3"> Amélia </option>
                    </select>    
                    <label for="inputGroupMonitor" class="align-items-center labelInput">Monitor(a)</label>
                </div>
            </div>

            
            @endif

            @foreach($listaMeses as $mesano=>$listaAtividades)

            @php
            $nomecampo = $mesano; 
            $mesano = str_replace(" ","_",$mesano);
            
            @endphp
            <div class="col-12">
                <div class="group">
                    <div class="groupslot-header slot-1" data-toggle="collapse" data-target="#{{$mesano}}, #{{$mesano}}1, #{{$mesano}}2">
                        <div class="groupslot-header-card slot-card slot-card-1 dark">
                            <h4 class="header-title" id="mes_atividade">{{$nomecampo}}</h4>
                            <h4 id="{{$mesano}}1" class="icon-sm collapse">expand_more</h4>
                            <h4 id="{{$mesano}}2" class="icon-sm collapse show">expand_less</h4>
                        </div>
                    </div>
                    
                    <div id="{{$mesano}}" class="collapse" aria-labelledby="{{$mesano}}">
                        <div class="groupslot">
                            
                            <div class="col-8 col-md-12 slot-card light-gray" style="justify-content: left !important;">
                                
                                <ul>
                                    @foreach($listaAtividades as $atividades)
                                    <li style="text-align: left;">{{$atividades->dia_atividade}}/{{$atividades->mes_atividade}} - {{$atividades->desc_atividade}} ({{$atividades->hora_gasto}}h{{$atividades->min_gasto}}min)
                                    </li>
                                    @endforeach

                                </ul>
                                
                            </div>
                        </div>
        
                        
                    </div>
                </div>

            </div>  
            @endforeach
    
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="registraAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="registraAtividadeModalTitle" aria-hidden="true">
                                
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="d-grid flex-column justify-content-around align-items-center">
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registro de atividade realizada</h5>

                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div style="font-size: 13px; padding: 0 10px;">
                          Informação visível <b>somente para o professor.</b>
                        </div>
                    </div>
                    <form action="/classdashboard/createAtv" method="POST">
                        @csrf
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <textarea class="form-control inputsTexto2 inputsTexto" placeholder="Description" style="border-radius: 20px !important;" name="desc_atividade"></textarea>
                            <label for="floatingTextarea" class="align-items-center" style="color: grey;">Descrição da atividade</label>
                          </div>
                    
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" name="data"
                placeholder="usuario">
                            <label for="dataInput" class="align-items-center" style="color: grey;">Data de realização</label>
                        </div>
                    
                        <div class="form-floating mb">
                            <input type="time" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" name="tempo_gasto"
                placeholder="usuario">
                            <label for="timeInput" class="align-items-center" style="color: grey;">Tempo gasto</label>
                        </div>
                    </div>
                    
                </div>

                <div class="d-flex w-100 justify-content-center align-items-center mb-3 py-4">
                    <button type="submit" class="buttonEntrar btn btn-primary" >Registrar</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>
    </div>

    <!--Fim do modal-->
@stop