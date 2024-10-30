# Laravel Studies
Este projeto foi criado no contexto do curso
Laravel Completo - Framework, ecossistema e Projetos Web (Udemy)
@João Ribeiro

# Instalação
Abrir o terminal e executar o seguinte comando:
composer update

## Quando quiser criar um model com migration e o seed no mesmo comando

```sh
$ php artisan make:model User --migration --seed
```

Executando as seeders
```sh
$ php artisan db:seed --class=UserSeeder
$ php artisan db:seed --class=PostSeeder
```
