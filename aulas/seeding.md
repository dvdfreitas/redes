# Seeding

## Introdução

Fazer o "seeding" de uma base de dados é o processo de preencher a base de dados com dados que podem ser usados para testar a aplicação. Nada impede que estes dados não sejam reais. Deveremos, no entanto, ter sempre em atenção que na fase de desenvolvimento e testes, alguma da informação poderá estar mais facilmente acessível a pessoas não autorizadas.

Este é um processo essencial para o teste de aplicações. 

## Seeding no Laravel

No Laravel as classes de Seeding estão na pasta ```database/seeders```. Por defeito, está definida a classe ```DatabaseSeeder``` de onde se pode chamar o método ```call()``` para chamar outras classes de seeding.

Uma das formas mais fáceis de mostrar a utilidade do "seeding" é acrescentar um utilizador à base de dados, alterando a função ```run()``` da classe ```DatabaseSeeder``` para:

```php
public function run(): void
{
    \App\Models\User::factory()->create([
        'name' => 'David Freitas',
        'email' => 'david.freitas@aeg1.pt',
        'password' => Hash::make('123')
    ]);
}
```

Para executar o seed poderá utilizar:

```bash
php artisan db:seed
```

Note que se utilizar o comando acima mais do que uma vez, será certamente gerado um erro porque o utilizador com o email david.freitas@aeg1.pt já existirá na base de dados e este tem de ser único.

Uma possível solução será recomeçar a base de dados de raiz, executando:

```bash
php artisan migrate:fresh
php artisan db:seed
```

ou, de forma mais simples e compacta:

```bash
php artisan migrate:fresh --seed
```

Outra solução poderia passar por substituir a criação do utilizador pelo seguinte: 

```php
DB::table('users')->insertOrIgnore([
    'name' => "David Freitas",
    'email' => "david.freitas@aeg1.pt",
    'password' => Hash::make('password'),
]);
```

Como sempre na programação, cada problema poderá passar por soluções bastante diferentes.

## Classes de Seeding

Brevemente disponível.

## Informações adicionais

O "mass assignment" está automaticamente desativado durante o "seeding".
