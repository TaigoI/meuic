<!-- Modal -->
<div class="modal fade" id="registraAtividadeModal" tabindex="-1" role="dialog" aria-labelledby="registraAtividadeModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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
                    <form action="/activities/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <textarea class="form-control inputsTexto2 inputsTexto" placeholder="Description" style="border-radius: 20px !important;" name="desc_atividade" required></textarea>
                                <label for="floatingTextarea" class="align-items-center" style="color: grey;">Descrição da atividade</label>
                            </div>
                        
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" name="data" placeholder="usuario" required>
                                <label for="dataInput" class="align-items-center" style="color: grey;">Data de realização</label>
                            </div>
                        
                            <div class="form-floating mb">
                                <input type="time" class="form-control inputsTexto2 inputsTexto" style="border-radius: 20px !important;" name="tempo_gasto" placeholder="usuario" required>
                                <label for="timeInput" class="align-items-center" style="color: grey;">Tempo gasto</label>
                            </div>
                        </div>
                     
                        <div class="d-flex w-100 justify-content-center align-items-center mb-3 py-4">
                            <button type="submit" class="buttonEntrar btn btn-primary">Registrar</button>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>

<!--Fim do modal-->