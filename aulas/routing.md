# Routing

Vamos criar uma nova vista, que será uma página que permitirá a visualização de todos os utilizadores registados.

Comecemos por criar uma nova rota, no ficheiro `routes/web.php`:

```php
Route::get('/users', function () {
    return view('users');
});
```


