<h1> 
    Teste de Laravel com o tema da @RinhaDeBackEnd
</h1>

Para rodar o projeto é necessário ter docker/docker-compose instalado e executar alguns comandos.

<h3> Passo 1 </h3><br> Após fazer o merge entre na pasta root 'example-app' e rode "docker-compose up -d", caso necessário utilize o sudo para permissões.

<h3> Passo 2 </h3><br> Rode "docker-compose exec app bash" para entra no container do Laravel. 

<h3> Passo 3 </h3><br> Rode "cd /var/www" para conseguir executar os comandos do artisan no container.

<h3> Passo 4 </h3><br> Rode "php artisan migrate" para criar as tabelas no banco de dados postgres que está no outro container e rode "php artisan serve --host=0.0.0.0 --port=8000" para executar o servidor de desenvolvimento do Laravel.

<h3> Sobre as API's </h3><br>
Todas elas estão mapeadas em "localhost:8000/api/pessoas", tendo assim um CRUD completo com DTO para validação dos dados.
A estrutura do JSON pessoa é a seguinte: 
{
	"nome" : String,
	"apelido" : String,
	"nascimento" : String,
	"stack" : []
}

segue de exemplo: 
{
	"nome" : "Heron",
	"apelido" : "kdolphin",
	"nascimento" : "2004-07-08",
	"stack" : ["laravel", "rust", "go", "flutter"]
 }

E segue o controller de pessoas para facilitar a vida como não foi utilizado Swagger:

Route::get("pessoas", PessoasController::class . "@index");
Route::post("pessoas", PessoasController::class . "@store");
Route::get("pessoas/{id}", PessoasController::class . "@show");
Route::put("pessoas/{id}", PessoasController::class . "@update");
Route::delete("pessoas/{id}", PessoasController::class . "@destroy");
