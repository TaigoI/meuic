<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Style Sheet-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- End of Style Sheet-->
        
        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--End of Google Fonts-->

        <!--Bootstrap dependencies-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--End of Bootstrap dependencies-->
        
        <title>Meu@IC</title>
    </head>
    <body>
        <!--Header-->
        <div class="header fixed-top d-flex p-4 px-md-5 mb-3 bg-light">
            <!--Meu@IC logo-->
            <div class="header-logo d-md-flex my-auto flex-grow-1">
                <h2 class="mr-3 p-2">Meu@IC</h2>
            </div>  
            <!--End of Meu@IC logo--> 

			<!--Botoes Usuario Logado-->
			@if(Auth::check())
				<div class="header-buttons d-grid gap-2 d-flex flex-row justify-content-end align-items-center">
					<!--Botoes Header-->
					<!--Se o usuario for monitor-->
					@if(Auth::user()->role == 'M')
						<div class="dropdown">
						<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Monitor
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Historico</a>
							<a class="dropdown-item" href="#">Administrar disciplina</a>
						</div>
						</div>
					@endif

					<!--Se o usuario for professor-->
					@if(Auth::user()->role == 'T')
						<div class="dropdown">
						<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Professor
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Gerenciar disciplinas</a>
							<a class="dropdown-item" href="#">Gerenciar monitores</a>
						</div>
						</div>
					@endif
	
					@if(Auth::user()->role == 'T' or Auth::user()->role == 'M')
						<button class="btn rounded-pill topbar_button blue" type="button">
							<div class="material-icons">
								add_task
							</div>
							&nbsp;Atividades
						</button>
					@endif

					<button class="btn rounded-pill topbar_button dark" type="button">
						<div class="material-icons">
							event
						</div>
						&nbsp;Agendar
					</button>

					@if(Request::is('profile'))
						<form method="GET" action="/logout">
							<button class="btn rounded-pill topbar_button dark" type="submit">
								<div class="material-icons">
									logout
								</div>
								&nbsp;Sair
							</button>
						</form>
					@endif
					<!--End of Botoes Header-->
					
					<!--Profile picture icon-->
					@if(!Request::is('profile'))
						<a href="/profile">
							<img class="rounded-circle m-auto" src="{{Auth::user()->picture_url}}" width="40" height="40"> 
						</a>
					@endif
					<!--End of Profile picture icon-->            
				</div>      
			@endif

			<!--Botao Login-->
			@if(!Auth::check())
				<form method="GET" action="/auth/google">
					<div class="header-buttons d-grid gap-2 d-flex flex-row justify-content-end align-items-center">
						<button class="btn rounded-pill topbar_button white" type="submit">
							<div class="px-1">
								<img class="rounded-circle m-auto" src="https://logopng.com.br/logos/google-37.png" width="20" height="20"> 
							</div>
							&nbsp;Login with Google
						</button>        
					</div>
				</form>
			@endif
        </div>
        <!--End of Header-->

        <!--Aqui vai o corpo da página-->
        <div class="container page-container">
            @yield('page content')
        </div>
        <!--Aqui termina o corpo da página-->
        
        <!--Footer-->
        <div class="footer">
            <footer class="footer mt-auto py-4 bg-light">
                <p>©2022 Meu@IC. Todos os direitos reservados.</p>  
            </footer>
        </div>
        <!--End of Footer-->

        <!--Bootstrap dependencies-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--End of Bootstrap dependencies-->
    </body>
</html>