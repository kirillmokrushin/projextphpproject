Платформа менторства MentorMe

API-проект для поиска менторов и записи на обучающие курсы.

Структура репозитория:

laravel/ - Основной код проекта на Laravel
docs/TZ.md - Техническое задание (ТЗ)
docs/database.md - Структура базы данных
docs/MentorMe_API.json - Коллекция Postman для тестирования API

База данных:

Тип: MySQL
Название БД: laravel
Таблицы: users, courses, categories, enrollments, reviews

Подробное описание всех таблиц в файле laravel/docs/database.md

Техническое задание (ТЗ):

Цель проекта, роли пользователей и функциональные требования описаны в файле laravel/docs/TZ.md

Как запустить проект локально:

1. Клонировать репозиторий
git clone https://github.com/kirillmokrushin/projextphpproject.git
cd projextphpproject/laravel

2. Настроить окружение
cp .env.example .env
php artisan key:generate

3. Настроить подключение к БД в файле .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

4. Выполнить миграции
php artisan migrate

5. Запустить сервер
php artisan serve

После этого сайт доступен по адресу http://127.0.0.1:8000

API тестирование:

Импортируйте коллекцию Postman из файла laravel/docs/MentorMe_API.json

Роли пользователей:

admin - полный доступ ко всем курсам и пользователям
mentor - создание и управление своими курсами
student - запись на курсы, просмотр своих записей
guest - только просмотр курсов (без записи)

Технологии:

Laravel 11, PHP 8.5, MySQL, Bootstrap 5, Laravel Breeze

