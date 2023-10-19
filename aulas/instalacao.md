# Software necessário

# Instalação 

## Laravel

Vamos instalar um projeto que iremos chamar ```redes```. Note que o nome do projeto é o nome da pasta que será criada e deverá estar relacionado com o nome do seu projeto. 

```bash
composer create-project laravel/laravel redes
```

## Jetstream

De seguida deverá entrar na pasta do projeto (```cd redes```)e executar o seguinte comando:

```bash
composer require laravel/jetstream
```

Iremos utilizar o jetstream com o ```livewire```. Para isso deverá executar o seguinte comando:

```bash
php artisan jetstream:install livewire
```

Neste momento não precisa de se preocupar sobre o que é o Livewire. 

## Finalização da instalação 

```bash
npm install
npm run build
```

## Configuração da base de dados

Para que o laravel use a base de dados correta, deverá alterar o ficheiro ```.env``` que se encontra na raiz do projeto e modificar a seguinte linha para o nome da base de dados. Deverá usar o nome adequado ao seu projeto.

```php
DB_DATABASE=redes
```

Nas últimas versões do Laravel, caso a base de dados não exista, o Laravel irá criá-la.

Finalmente, deverá executar as migrações:

```bash
php artisan migrate
```
