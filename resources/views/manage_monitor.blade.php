@extends('basic_component')


@section('page content')
<div class="row align-items-center py-4">
  <div class="col-2" style="width: min-content;">
    <a type="button" class="btn btn-dark material-icons" disabled style="background: #212529 !important; opacity: 1 !important;" href='/'>
      <i class="material-icons">arrow_back</i>
    </a>
  </div>
  <div class="col-10 col-md-11">
    <h4 class="m-0 mb-1 row discipline-name">
      Gerenciamento de monitores
    </h4>
   
  </div>
</div>

<div class="discipline-monitor-page ">
    @include('partials/feedback_basic_alert')

    <div class="py-4">
        <form role="form" method="POST" action="" name="selectDisciplinaForm" onchange="document.forms['selectDisciplinaForm'].submit();">
            <div class="form-floating d-flex justify-content-center">
            @csrf
                <select class="form-select" id="disciplinaSelect" name="disciplinaSelect">   
                    <option value="" data-default disabled selected>Selecione</option>
                          
                    @foreach ($listadisciplinas as $disciplina)
                        @if (session('idDisc') != null and $disciplina->id_disciplina == session('idDisc'))
                            <option type="submit" value={{$disciplina->id_disciplina}} selected> {{ $disciplina->name_disciplina }}</option>
                        @else
                            <option type="submit" value={{$disciplina->id_disciplina}}> {{ $disciplina->name_disciplina }}</option>
                        @endif
                    @endforeach   
                                 
                </select>
                <!--<button type="submit"> Enviar form </button>-->
                <label for="disciplinaSelect">Disciplina</label>
            </div>
        </form>
    </div>

    @if(isset($listaInfos))
        @if(count($listaInfos) == 0) 
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <i class="material-icons" style="font-size: 1.5em;">info</i>
            <div>
                &nbsp; Não existem monitores para essa disciplina.
            </div>
        </div>
        @else     
            @foreach ($listaInfos as $monitor)
            <div class="row py-2">
                <div class="row mb-4 align-items-center justify-content-center">
                    <div class="col-2 align-self-center px-0">
                        <div class="d-flex justify-content-center">
                            <img class="rounded-circle m-auto" src={{  $monitor["picture"] }} width="50" height="50"> 
                        </div>
                    </div>

                    <div class="col-6 px-0">
                        <h6 id="name" class="text-left fonteCorDiferente robotoFlex">{{ $monitor["name"] }}</h6>
                        <h7 id="email" class="text-left fonteCorDiferente robotoFlex">{{ $monitor["email"] }}</h7>
                    </div>

                    <div class="col-1">
                        <div class="d-flex justify-content-start">
                                <form role="form" method="post" action="{{ route('monitor_delete', ['email' => $monitor["email"]] ) }}" name="removeMonitorForm">
                                    @csrf
                                    @php
                                        $format_email = substr($monitor["email"], 0, strpos($monitor["email"], "@"));                                        
                                    @endphp
                                    <a name="disciplinaMonitor" value={{ $monitor["email"] }} data-bs-toggle="modal" data-bs-target="#{{ $format_email }}Modal" >
                                        <i class="material-icons" style="font-size: 2.0em; color: red;">do_disturb_on</i>
                                    </a>
                                    
                                    <div class="modal fade" id="{{ $format_email }}Modal" tabindex="-1" aria-labelledby="monitorExcludeConfirmModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Tem certeza que deseja remover o monitor <b id="monitorDisplayModal">{{ $monitor["name"] }}</b> da disciplina <b>{{session('idDisc')}}</b>?</p> 
                                            </div>
                                            
                                                <div class="px-3 py-4 d-flex justify-content-center">                                  
                                                    <button class="btn btn-success btn-sm rounded-pill" type="submit">
                                                        Confirmar
                                                    </button>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>

                                </form>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        @endif

        <div class="d-flex align-items-center justify-content-center py-4">
            <button class="add-monitor-button btn btn-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#addMonitorModal" onclick="javascript:cleanSearchUserForm()">
                <div class="material-icons">
                    add
                </div>
                &nbsp;Adicionar Monitor
            </button>
        </div>        
    @endif    
</div>

<!-- Modal -->
<div class="modal fade" id="addMonitorModal" tabindex="-1" role="dialog" aria-labelledby="addMonitorModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="d-grid flex-column justify-content-around align-items-center">
                <div class="modal-body">
                    <div class="title-group py-2 justify-self-center">
                        <h5 class="modal-title" style="padding-bottom: 0px;">Adicionar monitor à disciplina</h5>
                        <p style="font-size:small; color:grey; text-align: center;">{{session('idDisc')}}</p>
                    </div>

                    <div class="">
                        <div class="d-flex justify-content-center align-items-center py-2">
                            
                            <form action="javascript:search();" name="searchUserForm">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control inputsTexto2 modal-search-input" style="border-radius: 20px !important;" id="monitorEmailInput"></input>
                                            <label for="monitorEmailInput" class="align-items-center" style="color: grey;">Email do aluno</label>
                                        </div>
                                    </div>     
                                    <div class="col-1 d-flex justify-content-center align-items-center" id="searchMonitorButton">
                                        <a class="btn" onclick="document.forms['searchUserForm'].submit();" >
                                            <i class="material-icons" style="text-decoration:none; color:#5F73A5;">search</i>
                                        </a>
                                    </div> 
                                </div>
                            </form>

                        </div>

                        <!--Se o aluno não existir-->
                        <div id="feedbackPartialDiv" style="display: none;"> 
                            <!-- @include('partials/feedback_basic_alert')  -->                         
                            <div class="alert alert-warning" role="alert" id="feedbackPartial"> </div>
                        </div> 

                        <!--Se o aluno existir-->
                        <div class="px-1 py-2">
                            <div class="row py-2 d-flex align-items-center">
                                
                                <div class="col-10" style="padding-top: 12px;">
                                    <div id="nomeUser" class="text-left"></div>
                                    <div id="emailUser" class="text-left"></div>
                                </div>

                                <div style="display: none;" id="ButtonDiv">
                                    <div class="col-2 d-flex justify-content-end">                                  
                                        <button class="btn btn-dark btn-sm rounded-pill add-monitor-button" id="addMonitorButton" type="submit" onclick="javascript:add('<?php echo session('idDisc') ?>')" >
                                            Adicionar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>                
                    
                                               
                </div>
            </div>
        </div>
    </div>
</div>
  <!--Fim do modal-->

@stop