@extends('basic_component')

@section('page content')
<div class="row align-items-center py-4">
  <div class="col-2" style="width: min-content;">
    <button type="button" class="btn btn-dark material-icons" disabled style="background: #212529 !important; opacity: 1 !important;">
      <i class="material-icons">arrow_back</i>
    </button>
  </div>
  <div class="col-10 col-md-11">
    <h4 class="m-0 mb-1 row discipline-name">
      Gerenciamento de monitores
    </h4>
  </div>
</div>

<div class="discipline-monitor-page ">

    <div class="py-4">
        <div class="form-floating d-flex justify-content-center">
            <select class="form-select" id="floatingSelectGrid">
                <option selected>Projeto e Análise de Algoritmos</option>
                <option value="">Projeto de Software</option>
                <option value="">Programação 3</option>
            </select>
            <label for="floatingSelectGrid">Disciplina</label>
        </div>
    </div>

    <div class="row py-2">
        <div class="row mb-4 align-items-center justify-content-center">
            <div class="col-2 align-self-center px-0">
                <div class="d-flex justify-content-center">
                    <i class="material-icons" style="font-size: 3.0em;">account_circle</i>
                </div>
            </div>

            <div class="col-6 px-0">
                <h6 id="nomeUser" class="text-left fonteCorDiferente robotoFlex">Fulano de Tal</h6>
                <h7 id="emailUser" class="text-left fonteCorDiferente robotoFlex">fdt@ic.ufal.br</h7>
            </div>

            <div class="col-1">
                <div class="d-flex justify-content-start">
                <i class="material-icons" style="font-size: 2.0em; color: red;">do_disturb_on</i>
                </div>
            </div>

        </div>
    </div>

    <hr style="margin-top: 0px;">

    <div class="row py-2">
        <div class="row mb-4 align-items-center justify-content-center">
            <div class="col-2 align-self-center px-0">
                <div class="d-flex justify-content-center">
                    <i class="material-icons" style="font-size: 3.0em;">account_circle</i>
                </div>
            </div>

            <div class="col-6 px-0">
                <h6 id="nomeUser" class="text-left fonteCorDiferente robotoFlex">Fulano de Tal</h6>
                <h7 id="emailUser" class="text-left fonteCorDiferente robotoFlex">fdt@ic.ufal.br</h7>
            </div>

            <div class="col-1">
                <div class="d-flex justify-content-start">
                    <i class="material-icons" style="font-size: 2.0em; color: red;">do_disturb_on</i>
                </div>
            </div>

        </div>
    </div>


    <div class="d-flex align-items-center justify-content-center py-4">
        <button class="add-monitor-button btn btn-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#addMonitorModal">
            <div class="material-icons">
                add
            </div>
            &nbsp;Adicionar Monitor
        </button>
    </div>
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
                        <p style="font-size:small; color:grey; text-align: center;">Projeto e Análise de Algoritmos</p>
                    </div>

                    <div class="">
                        <div class="row d-flex justify-content-center align-items-center py-2">
                            <div class="col-11">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control inputsTexto2 modal-search-input" placeholder="Description" style="border-radius: 20px !important;" id="monitorEmailInput" aria-describedby="sla"></input>
                                    <label for="monitorEmailInput" class="align-items-center" style="color: grey;">Email do aluno</label>
                                </div>
                            </div>

                            <div class="col-1 justify-content-start">
                                <a class="material-icons" href="#" style="text-decoration:none; color:#5F73A5;">search</a>
                            </div>
                        </div>

                        <!--Se o aluno existir-->
                        <div class="px-3 py-2">

                            <div class="row py-2 d-flex align-items-center">
                                <div class="col-2 align-self-center px-0">
                                    <div class="d-flex justify-content-center">
                                        <i class="material-icons" style="font-size: 3.0em;">account_circle</i>
                                    </div>
                                </div>

                                <div class="col-6" style="padding-top: 12px;">
                                    <h7 id="nomeUser" class="text-left">Fulano de Tal</h7>
                                    <p id="emailUser" class="text-left">fdt@ic.ufal.br</p>
                                </div>

                                <div class="col-4 d-flex justify-content-end">
                                  
                                <button class="btn btn-dark btn-sm rounded-pill add-monitor-button" type="button" data-bs-toggle="modal" data-bs-target="#addMonitorModal">
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
  <!--Fim do modal-->

  @stop