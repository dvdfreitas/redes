# Erros frequentes

```bash
'vite' is not recognized as an internal or external command, operable program or batch file.
```

Possível solução:

```bash
npm install
```

---

```bash
Failed to download laravel/laravel from dist: The zip extension and unzip/7z commands are both missing, skipping.
```

Possível solução:

Verificar se no ficheiro ```php.ini``` a linha não está comentada. Deve estar assim:

```bash
extension=zip
```

--- 

```bash
SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes
```

Possível solução:

Alterar o ficheiro ```AppServiceProvider.php``` e colocar na função ```boot``` o seguinte:

```php
public function boot()
{
    Builder::defaultStringLength(191);
}
```