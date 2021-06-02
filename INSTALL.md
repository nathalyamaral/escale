### Configurações

algoritimo base para gerar chave de acesso

chave = strtoupper(md5('3sCal3'.strtoupper(md5('Auth@')).strtoupper(md5(date('Ymd')))))

#### Gerar chave app e php migrate 
instalando pacote
```dotenv
php artisan key:generate
php artisan migrate
```

#### Criando documentação com swagger
instalando pacote
```dotenv
composer require mtrajano/laravel-swagger
```

publicar provider

config/app.php
```dotenv
'providers' => [
    ...
    Mtrajano\LaravelSwagger\SwaggerServiceProvider::class,
]
```
publicar arquivo de contfiguração
```dotenv
php artisan vendor:publish --provider="Mtrajano\LaravelSwagger\SwaggerServiceProvider"
```
gerando arquvio swagger.json
```dotenv
php artisan laravel-swagger:generate > public/swagger.json

```

#### Script postman teste da api disponivel no repositorio 
public/escale.postman_collection.json