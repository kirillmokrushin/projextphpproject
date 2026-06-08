# Структура базы данных

## Таблица users
| Поле | Тип | Описание |
|------|------|----------|
| id | BIGINT PK AI | ID пользователя |
| name | VARCHAR(255) | Имя |
| email | VARCHAR(255) UNIQUE | Email |
| password | VARCHAR(255) | Хэш пароля |
| role | ENUM('admin','mentor','student') | Роль пользователя |
| avatar | VARCHAR(255) NULL | Аватар |
| bio | TEXT NULL | Биография |
| rating | DECIMAL(3,2) DEFAULT 0 | Рейтинг ментора |
| created_at | TIMESTAMP | Дата создания |
| updated_at | TIMESTAMP | Дата обновления |
| deleted_at | TIMESTAMP NULL | Мягкое удаление |

## Таблица categories
| Поле | Тип | Описание |
|------|------|----------|
| id | BIGINT PK AI | ID категории |
| name | VARCHAR(255) UNIQUE | Название категории |
| slug | VARCHAR(255) UNIQUE | URL-идентификатор |
| created_at | TIMESTAMP | Дата создания |
| updated_at | TIMESTAMP | Дата обновления |

## Таблица courses
| Поле | Тип | Описание |
|------|------|----------|
| id | BIGINT PK AI | ID курса |
| title | VARCHAR(255) | Название курса |
| description | TEXT | Описание |
| price | DECIMAL(8,2) DEFAULT 0 | Цена |
| duration | INT NULL | Длительность в часах |
| category_id | BIGINT FK | Категория |
| mentor_id | BIGINT FK | Ментор (преподаватель) |
| deleted_at | TIMESTAMP NULL | Мягкое удаление |
| created_at | TIMESTAMP | Дата создания |
| updated_at | TIMESTAMP | Дата обновления |

## Таблица enrollments (записи на курсы)
| Поле | Тип | Описание |
|------|------|----------|
| id | BIGINT PK AI | ID записи |
| student_id | BIGINT FK | Студент |
| course_id | BIGINT FK | Курс |
| status | ENUM('pending','active','completed','cancelled') | Статус записи |
| completed_at | TIMESTAMP NULL | Дата завершения |
| created_at | TIMESTAMP | Дата создания |
| updated_at | TIMESTAMP | Дата обновления |

## Таблица reviews (отзывы)
| Поле | Тип | Описание |
|------|------|----------|
| id | BIGINT PK AI | ID отзыва |
| course_id | BIGINT FK | Курс |
| student_id | BIGINT FK | Студент |
| rating | INT (1-5) | Оценка |
| comment | TEXT | Текст отзыва |
| created_at | TIMESTAMP | Дата создания |
| updated_at | TIMESTAMP | Дата обновления |

## Связи между таблицами
- users (ментор) 1 → M courses
- users (студент) M → M courses (через enrollments)
- categories 1 → M courses
- courses 1 → M reviews
- courses 1 → M enrollments