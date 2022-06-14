### Tutorial de importar o dump no DBeaver

#### Porque DBeaver?

Taigo recomendou e eu achei mais legal que o PgAdmin

#### Etapas

* Baixar o arquivo dump.sql que está na master
* Iniciar Dbeavedr e Conectar a postgres
* Criar um novo banco de dados com o nome meu_ic
* Clicar com o botão direito em cima do banco, ir em Ferramentas > Executar Script

#### Configurar Local Client

Na tela de executar o script vai ter um botao **Local Client**

Cliquem nele e vão em browse.

Achem a pasta onde vai ter o pgsql. No meu linux foi /usr/bin.

No linux da pra usar "which pgsql" para achar o diretório. 

Selecionem o diretorio e adicionem a home.

#### Finalizando

* Escolham o arquivo dump.sql
* Start
* Deve dar erro por causa do nome, mas os dados vão estar lá
* F5 para atualizar


#### Laravel

Só mudar no arquivo .env para as configurações do banco, porta, dbname e etc