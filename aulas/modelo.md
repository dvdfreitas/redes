# Criação de modelos 

Objectivos desta aula

- Criar dois modelos: Categorias (Category) e Histórias (Story)

## Eloquent

O Laravel incluí o Eloquent, um ORM (object-relational mapper) que permite interagir com a base de dados de forma mais simples e intuitiva.

Quando se usa o Eloquent, cada tabela está associada a um "modelo" que é usado para interagir com essa tabela. Para além de aceder aos conteúdos da base de dados, é possível inserir, actualizar e apagar registos da tabela.

Neste exemplo, iremos criar dois modelos: Categorias (Category) e Histórias (Story).

Os modelos devem ser nomeados no singular, em PascalCase/CapitalCase, sem espaços entre palavras. O Laravel irá automaticamente associar o modelo à tabela com o mesmo nome, mas em snake_case (minúsculas separadas por _).

## Criação do modelo Category

Vamos criar o modelo ```Category``` e a respetiva tabela:

```bash
php artisan make:model Category -m
```

Nota: A opção `-m` permite criar a tabela associada ao modelo.

Serão criados dois ficheiros:

- app/Models/Category.php
- database/migrations/`[Data]`_create_categories_table.php

No ficheiro da tabela, onde diz data, dependerá do momento em que foi criado o modelo.

## Definição da tabela

A definição da tablea


