Платформа менторства MentorMe
Работу выполнил Мокрушин Кирилл Артёмович ПА - 01

Проект на Laravel для поиска менторов и записи на курсы.

Функции

Для всех пользователей
- Просмотр списка курсов
- Просмотр детальной страницы курса

Для студентов (после регистрации)
- Запись на курс
- Отмена записи
- Оставление отзывов
- Страница "Мои курсы"

Для менторов
- Панель "Управление курсами"
- Просмотр количества записанных студентов

Для администратора
- Полный доступ (через базу данных)

Технические функции
- Регистрация с выбором роли (студент / ментор)
- Аутентификация
- База данных MySQL
- API с документацией Postman

Тестовые пользователи

| Роль | Email | Пароль |
|------|-------|--------|
| Администратор | admin@test.com | 12345678 |
| Ментор | anna@test.com | 123456 |
| Студент | ivan@gmail.com | 12345678 |

Технологии

- Laravel 11
- PHP 8.5
- MySQL
- Bootstrap 5

Документация

| Файл | Описание |
|------|----------|
| laravel/docs/TZ.md | Техническое задание |
| laravel/docs/database.md | Структура базы данных |
| laravel/docs/MentorMe_API.json | Postman коллекция |

Запуск проекта
  bash
1. Установить OpenServer

2. Клонировать репозиторий
git clone https://github.com/kirillmokrushin/projextphpproject.git
cd projextphpproject/laravel

3. Установить зависимости Composer
composer install

4. Настроить окружение
   
cp .env.example .env

php artisan key:generate

6. Настроить базу данных
   
Открыть файл .env и проверить настройки:

DB_CONNECTION=mysql

DB_HOST=MySQL-8.0

DB_PORT=3306

DB_DATABASE=laravel

DB_USERNAME=root

DB_PASSWORD=

8. Запустить миграции
php artisan migrate

9. Установить и собрать фронтенд
   
npm install

npm run build

10. Запустить сервер
php artisan serve

11. Открыть в браузере
http://127.0.0.1:8000
