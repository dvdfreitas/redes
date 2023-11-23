# Controladores

Como vimos na aula sobre routing, é possível definir ações para cada rota. Por exemplo, a rota `/` pode ser definida com a seguinte ação:

```php
Route::get('/', function () {
    return view('welcome');
});
```

Quando a nossa aplicação recebe um pedido **GET** para a rota `/`, é executada a função anónima que devolve a vista `welcome`. No nosso caso é a vista ```welcome.blade.php``` que se encontra na pasta ```resources/views```.

No entanto, é muito frequente que as ações a serem executadas sejam mais complexas. Por isso, temos interesse, em vez de colocar todo o código no ficheiro ```web.php``` podemos definir controladores.

<!-- Referenciar closures -->

Para evitar que as rotas fiquem demasiado complexas, é possível definir controladores. Um controlador é uma classe que agrupa ações relacionadas com um recurso. Por exemplo, um controlador `UserController` pode tratar de todas as ações relacionadas com utilizadores, incluindo mostrar, criar, atualizar e apagar utilizadores. Por defeito, os controladores são guardados na pasta `app/Http/Controllers`.

Os controladores permitem organizar o comportamento da nossa aplicações dividindo-os por classes. 

No Laravel, podemos criar um controlador com o comando:

```bash
php artisan make:controller Story
```

<!--
Controllers can group related request handling logic into a single class. For example, a UserController class might handle all incoming requests related to users, including showing, creating, updating, and deleting users. By default, controllers are stored in the app/Http/Controllers directory.
-->

Podemos assim delegar ações para o controlador. Por exemplo, podemos definir a rota `/stories` para o método `index` do controlador `StoryController`:

```php
Route::get('/stories', [StoryController::class, 'index']);
```


## CRUD

CRUD é um acrónimo para:

- Create

- Read

- Update 

- Delete

Em Laravel podemos considerar os modelos Eloquent como recursos, é habitual atuar sobre eles com o mesmo tipo de ações. É assim possível que os utilizadores possam criar, ler, atualizar ou apagar esses recursos.

Como estas operações são tão usuais, é possível, em Laravel, atribuir rotas a um controlado com uma única linha de código:

```bash
php artisan make:controller Story --resource
```

| HTTP Verb	| Path (URL) | Action (Method) | Route Name |
| --- | --- | --- | --- |
| GET | /stories | index | stories.index |
| GET | /stories/create | create | stories.create |
| POST | /stories | store | stories.store |
| GET | /stories/{id} | show | stories.show |
| GET | /stories/{id}/edit | edit | stories.edit |
| PUT/PATCH | /stories/{id} | update | stories.update |
| DELETE | /stories/{id} | destroy | stories.destroy |

## Exercícios

1 - Crie um acróstico para CRUD considerando as letras iniciais. 

**Exemplo:** **C**omer **R**apidamente **U**m **D**oce.     

2 - Crie um controlador para o modelo `Categories` com as operações de CRUD.

3 - Implemente as operações criadas no ponto anterior.

## Referências 

Controllers: [https://laravel.com/docs/10.x/controllers](https://laravel.com/docs/10.x/controllers)