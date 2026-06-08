Структура базы данных

Таблица users (пользователи)
- id
- name
- email
- password
- role (admin, mentor, student)
- created_at
- updated_at

Таблица categories (категории курсов)
- id
- name
- slug
- created_at
- updated_at

Таблица courses (курсы)
- id
- title
- description
- price
- duration
- category_id (связь с categories)
- mentor_id (связь с users)
- created_at
- updated_at
- deleted_at (soft delete)

 Таблица enrollments (записи на курсы)
- id
- student_id (связь с users)
- course_id (связь с courses)
- status (pending, active, completed, cancelled)
- created_at
- updated_at

Таблица reviews (отзывы)
- id
- course_id (связь с courses)
- student_id (связь с users)
- rating (1-5)
- comment
- created_at
- updated_at

Связи
- Курс belongs to категория и ментор
- Курс has many отзывов и записей
- Пользователь has many отзывов и записей