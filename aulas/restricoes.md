# Restrições de acesso

Muitas vezes queremos que apenas alguns utilizadores tenham acesso a certas páginas ou serviços.

O Laravel permite implementar este tipo de autenticação de forma simples e rápida.

Por uma questão de simplificação vamos considerar que cada utilizador pode ter várias habilidades (abilities) que condicionam o acesso a certas páginas ou serviços.

**Exercício:** Qual a desvantagem desta abordagem?

## Criação das tabelas

Vamos iniciar a resolução deste problema criando um modelo ```Ability``` com a respetiva migração com o comando:

```bash
php artisan make:model Ability -m
```

À nossa tabela de habilidades (```abilities```) acrescentaremos dois campos:

- ```name``` - nome da habilidade;

- ```slug``` - identificador único da habilidade.

```php
Schema::create('abilities', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug');
    $table->timestamps();
});
```
Acrescentaremos ainda uma tabela ```pivot``` que permitirá relacionar utilizadores com habilidades.

```php

Schema::create('ability_user', function (Blueprint $table) {
    $table->id();            
    $table->timestamps();
    $table->foreignId('ability_id')->constrained()->onDelete('cascade');
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
});
```

Note-se que este código deverá estar na função ```up()``` da migração. Repare-se que tirando partido do método ```constrained()``` não é necessário acrescentar as chaves externas, já que este método usa as convençoes para determinar a tabela e coluna que está a ser referenciada.

Finalmente, devemos alterar o método ```down()``` para que a migração possa ser revertida.

```php
public function down(): void
{
    Schema::dropIfExists('ability_user');
    Schema::dropIfExists('abilities');
}
```

**Exercício:**  Implemente o modelo ```Ability``` e respetivas relações e preencha as tabelas ```users```, ```abilities``` e ```ability_user``` com dados de teste.

## 

Uma das potencialidades do Laravel é podermos muito facilmente ver que habilidades um utilizador tem.

Para isso, basta no modelo ```User``` acrescentar o seguinte método:

```php
public function abilities() {
    return $this->belongsToMany(Ability::class);
}
```

Para testar que o método está a funcionar corretamente, podemos executar o seguinte código no ```tinker```:

```bash
php artisan tinker
```

```
$user = App\Models\User::find(1);
$user->abilities;
```

Se executou tudo corretamente, deverá ver uma lista de habilidades que o utilizador com id 1 tem.

Dependendo da versão, eventualmente, não será necessário escrever o caminho todo para o User.

**Exercício:** Implemente o método ```abilities()``` no modelo ```User```. E teste no ```tinker```.

Nota: O tinker não funciona em "realtime". Se efetuar alterações à base de dados terá de sair do tinker e voltar a entrar.

## Controlar o acesso a uma rota

No ficheiro ```AuthServiceProvider.php``` podemos alterar a função ```boot``` para controlar o acesso 

```php
public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {                                    
            if ($user->id == 1) return true;
        }
    }
```