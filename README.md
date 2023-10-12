<h1> 
    Teste de Laravel com o tema da @RinhaDeBackEnd
</h1>
<h2>ATENÇÃO</h2>
Pode haver diferença no arquivo dockerfile por conta de S.O e permissões do usuário.<br>
Para rodar o projeto é necessário ter docker/docker-compose instalado e executar alguns comandos.

<h3> Passo 1 </h3><br> Rode "docker-compose up -d", caso necessário utilize o sudo para permissões.

<h3> Passo 2 </h3><br> Rode "docker-compose exec app composer install" e depois "docker-compose exec app bash" para entrar no container do Laravel. 

<h3> Passo 4 </h3><br> Rode "php artisan migrate" para criar as tabelas no banco de dados postgres que está no outro container e rode "php artisan serve --host=0.0.0.0 --port=8000" para executar o servidor de desenvolvimento do Laravel.

<h3> Sobre as API's </h3><br>
Todas elas estão mapeadas em "localhost:8000/api/pessoas", tendo assim um CRUD completo com DTO para validação dos dados.<br>
A estrutura do JSON pessoa é a seguinte: <br>
{<br>
	"nome" : String, <br>
	"apelido" : String, <br>
	"nascimento" : String, <br>
	"stack" : [] <br>
}
<br>
segue de exemplo: <br> 
{<br>
	"nome" : "Heron", <br>
	"apelido" : "kdolphin", <br>
	"nascimento" : "2004-07-08", <br>
	"stack" : ["laravel", "rust", "go", "flutter"] <br>
 }
<br>
E segue o controller de pessoas para facilitar a vida como não foi utilizado Swagger: <br>

<br>Route::get("pessoas", PessoasController::class . "@index");
<br>Route::post("pessoas", PessoasController::class . "@store");
<br>Route::get("pessoas/{id}", PessoasController::class . "@show");
<br>Route::put("pessoas/{id}", PessoasController::class . "@update");
<br>Route::delete("pessoas/{id}", PessoasController::class . "@destroy");
