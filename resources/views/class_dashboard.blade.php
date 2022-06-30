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

@include('partials/feedback_basic_alert')

<div class="container"> 
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
            
    <!-- Dropdowns de professor -->
    @if(Auth::user()->user_role == 'T')
    <div class="row align-items-top">
        <div class="col-12 col-md-5">
            <div class="form-floating mb-4">
                <select class="form-select slot-1 dropdown" id="inputGroupDisciplina">
                    <option value="" data-default disabled selected>Selecione</option>
                    
                    @foreach ($listadisciplinas as $disciplina)
                        @if (session('idDisc') != null and $disciplina->id_disciplina == session('idDisc'))
                            <option type="submit" value={{$disciplina->id_disciplina}} id=disciplina_selecionada selected> {{ $disciplina->name_disciplina }}</option>
                        @else
                            <option type="submit" value={{$disciplina->id_disciplina}}> {{ $disciplina->name_disciplina }}</option>
                        @endif
                    @endforeach     
                    
                </select>
                <label for="inputGroupDisciplina" class="align-items-center labelInput">Disciplina</label>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="form-floating mb-4">
                <select class="form-select slot-1 dropdown" id="inputGroupMonitor">
                    <option value="" selected> Selecione </option>
                </select>    
                <label for="inputGroupMonitor" class="align-items-center labelInput">Monitor(a)</label>
            </div>
        </div>
    @endif

        @if(Auth::user()->user_role == 'T')
        <div class="col-12 col-md-2">
            <button class="btn main-button blue" type="submit" id="searchbutton", >
                <div class="icon-sm">
                    event
                </div>
                <!-- <a href="{{route('find_activity', 'ebo@ic.ufal.br')}} "> Buscar Atividades </a> -->
                Buscar Atividades
                
            </button>
        </div>
        @elseif(Auth::user()->user_role == 'M')
        <div class="row d-flex justify-content-end">
            <div class="col-12 col-md-2">
                <button class="btn main-button blue" type="button" data-bs-toggle="modal" data-bs-target="#registraAtividadeModal">
                    <div class="icon-sm">
                        event
                    </div>
                    Registrar Atividades
                </button>
            </div>
        </div>
        @endif
    </div>
        <!-- Isso aqui so pode aparecer quando ele clicar no botao  -->
        @foreach($listaMeses as $mesano=>$listaAtividades)

            @php
            $nomecampo = $mesano; 
            $mesano = str_replace(" ","_",$mesano);
            
            @endphp
        
            <div class="d-flex justify-content-center">
                <div class="col-12">
                    <div class="group">
                        <div class="groupslot-header slot-1" data-bs-toggle="collapse" data-bs-target="#{{$mesano}}, #{{$mesano}}1, #{{$mesano}}2">
                            <div class="groupslot-header-card header-card slot-card-1 dark">
                                <h4 class="header-title" id="mes_atividade">{{$nomecampo}}</h4>
                                <h4 id="{{$mesano}}1" class="icon-sm collapse">expand_more</h4>
                                <h4 id="{{$mesano}}2" class="icon-sm collapse show">expand_less</h4>
                            </div>
                        </div>
                        
                        <div id="{{$mesano}}" class="collapse" aria-labelledby="{{$mesano}}">
                            <div class="groupslot">
                                
                                <div class="col-12 header-card light-gray" style="justify-content: left !important;">
                                    
                                    <ul style="margin: 0px !important">
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
            </div>               
        
        @endforeach
        
    </div>
    <div id="activitiesDiv">

    </div>
</div>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


<script>
    $('#inputGroupDisciplina').on('change',e => {
        $("#inputGroupMonitor").find('option').not(':first').remove();
        var url = "{{ url('activities/monitors?id_disciplin=')}}";
        //console.log($('#inputGroupDisciplina').val());
        var id_disc = $('#inputGroupDisciplina').val();
        $.ajax({
            url: url +id_disc,
            type: 'get',
            dataType:'json',
            success: function(response){
                len = response.length;
                for(var i=0;i<len;i++){
                    var name = response[i].name
                    var email = response[i].email
                    var option = "<option value='"+email+"'>"+name+"</option>";

                    $("#inputGroupMonitor").append(option);

                }
            } 
        })
    })
</script>
<script>
    $("#searchbutton").on('click',e => {
        // var url = "{{ url('activities/find_activity?id_monitor=') }} ";
        // $.ajax({
        //     url: url+monitor,
        //     type: 'get',
        //     dataType: 'json'
            
        // });
        
    var monitor = document.getElementById("inputGroupMonitor").value;
    var req = new XMLHttpRequest();
    req.responseType = "json";
    req.open("GET", 'activities/find_activity/' + monitor, true);
    req.onload = function () {
        window.location.href = "/activities/find_activity/"+monitor;
    };
    req.send(null);
});
    
</script>
@include('partials/create_activity_modal')
    
@stop