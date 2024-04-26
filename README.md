Тестовое задание для Alina.kz
 
В проекте рекализовано несколь сушностей

- Пользователь с регистрацией по номеру телефона
- справочник статусов задач
- справочник приоритеов задач
- Задачи


Проект можно запустить двумя методами через Docker и через artisan serveё

переименовть .env.example -> .env

1) Для запуска docker

- docker-compose build
- docker-compose up

внутри контейнера запустить

php artisan migrate
php artisan db:seed

composer update


2) через artisan serve

предварительно настроить Базу данных 

в терминале прописать 

php artisan migrate
php artisan db:seed

php artisan serve


