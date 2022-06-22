@extends('basic_component')

@section('page content')

<div class="container page-container"> 
        <div class="row align-items-center py-4">
            <div class="col-2" style="width: min-content;">
                <a href="../maindashboard/mainDashboard.html">
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

            <div class="col-12 col-md-2">
                <button class="btn main-button blue" type="button" data-toggle="modal" data-target="#registraAtividadeModal">
                    <div class="icon-sm">
                        event
                    </div>
                    Registrar Atividades
                </button>
            </div>

            <div class="col-12">
                <div class="group">
                    <div class="groupslot-header slot-1" data-toggle="collapse" data-target="#G0M, #G0L, #G0">
                        <div class="groupslot-header-card slot-card slot-card-1 dark">
                            <h4 class="header-title">Semana N (00/00/0000 a 00/00/0000)</h4>
                            <h4 id="G0M" class="icon-sm collapse">expand_more</h4>
                            <h4 id="G0L" class="icon-sm collapse show">expand_less</h4>
                        </div>
                    </div>
        
                    <div id="G0" class="collapse show" aria-labelledby="headingOne">
                        <div class="groupslot slot-1">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Segunda</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed 
                                    enim a lorem vehicula hendrerit ut vitae elit.
                                </h4>
                            </div>
                        </div>
        
                        <div class="groupslot slot-2">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Terça</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Cras a tristique ipsum, eget pharetra diam. Maecenas consectetur nec nibh
                                    at sollicitudin. Maecenas erat tortor, dignissim ut nisl ac, iaculis 
                                    condimentum eros. Proin condimentum lacus et purus aliquam eleifend.
                                </h4>
                            </div>
                        </div>
        
                        <div class="groupslot slot-1">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Quinta</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Donec semper, nulla eget semper facilisis, erat mauris sagittis dui, in
                                    tempus augue eros quis nisl. Aliquam at ultricies urna.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div class="groupslot-header slot-1" data-toggle="collapse" data-target="#G1M, #G1L, #G1">
                        <div class="groupslot-header-card slot-card slot-card-1 dark">
                            <h4 class="header-title">Semana N (00/00/0000 a 00/00/0000)</h4>
                            <h4 id="G1M" class="icon-sm collapse show">expand_more</h4>
                            <h4 id="G1L" class="icon-sm collapse">expand_less</h4>
                        </div>
                    </div>
        
                    <div id="G1" class="collapse" aria-labelledby="headingOne">
                        <div class="groupslot slot-1">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Segunda</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed 
                                    enim a lorem vehicula hendrerit ut vitae elit.
                                </h4>
                            </div>
                        </div>
        
                        <div class="groupslot slot-2">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Terça</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Cras a tristique ipsum, eget pharetra diam. Maecenas consectetur nec nibh
                                    at sollicitudin. Maecenas erat tortor, dignissim ut nisl ac, iaculis 
                                    condimentum eros. Proin condimentum lacus et purus aliquam eleifend.
                                </h4>
                            </div>
                        </div>
        
                        <div class="groupslot slot-1">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Quinta</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Donec semper, nulla eget semper facilisis, erat mauris sagittis dui, in
                                    tempus augue eros quis nisl. Aliquam at ultricies urna.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div class="groupslot-header slot-1" data-toggle="collapse" data-target="#G2M, #G2L, #G2">
                        <div class="groupslot-header-card slot-card slot-card-1 dark">
                            <h4 class="header-title">Semana N (00/00/0000 a 00/00/0000)</h4>
                            <h4 id="G2M" class="icon-sm collapse show">expand_more</h4>
                            <h4 id="G2L" class="icon-sm collapse">expand_less</h4>
                        </div>
                    </div>
        
                    <div id="G2" class="collapse" aria-labelledby="headingOne">
                        <div class="groupslot slot-1">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Segunda</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed 
                                    enim a lorem vehicula hendrerit ut vitae elit.
                                </h4>
                            </div>
                        </div>
        
                        <div class="groupslot slot-2">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Terça</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Cras a tristique ipsum, eget pharetra diam. Maecenas consectetur nec nibh
                                    at sollicitudin. Maecenas erat tortor, dignissim ut nisl ac, iaculis 
                                    condimentum eros. Proin condimentum lacus et purus aliquam eleifend.
                                </h4>
                            </div>
                        </div>
        
                        <div class="groupslot slot-1">
                            <div class="col-4 col-md-2 slot-card dark unround-right">
                                <h4 class="slot-text">Quinta</h4>
                            </div>
                            <div class="col-8 col-md-10 slot-card light-gray unround-left">
                                <h4 class="slot-text">
                                    Donec semper, nulla eget semper facilisis, erat mauris sagittis dui, in
                                    tempus augue eros quis nisl. Aliquam at ultricies urna.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

    
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