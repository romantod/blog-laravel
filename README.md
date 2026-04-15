# Blog Laravel

A full-featured blog application built with Laravel 12 as a learning project.  
Полнофункциональное блог-приложение на Laravel 12, созданное в учебных целях.

---

## 🇬🇧 English

### About

This project was built step by step while learning Laravel and PHP backend development. It covers a wide range of topics from basic CRUD to REST API, queues, events, caching, and Docker.

### Features

- Posts with categories, tags, excerpts and pagination
- Full CRUD for posts, categories, tags and users
- Authentication via Laravel Breeze (register, login, profile)
- Admin middleware — route protection by role
- Search and filtering by author, category, tag
- Sorting by date, title, category name
- REST API with API Resources (PostResource, VacancyResource)
- HH.ru API integration — vacancy search
- Queue system with Jobs (`LogPostCreated`, `SendVacanciesNotification`)
- Laravel Scheduler — automated job dispatch
- Events and Listeners — Observer pattern
- Cache with invalidation
- Unit and Feature tests with factories
- Docker setup — nginx, php-fpm, mysql

### Tech Stack

- PHP 8.4
- Laravel 12
- MySQL 8
- Tailwind CSS
- Docker + nginx

### Installation (local)

```bash
git clone <repo-url>
cd blog-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run build
php artisan serve
```

Login: `test@example.com` / `11111111`

### Installation (Docker)

```bash
docker-compose up --build -d
docker-compose exec app php artisan migrate --seed
```

Open: http://localhost:8080

### API Endpoints

| Method | URL | Description |
|--------|-----|-------------|
| GET | /api/posts | List posts |
| GET | /api/posts/{id} | Single post |
| POST | /api/posts | Create post |
| PUT | /api/posts/{id} | Update post |
| DELETE | /api/posts/{id} | Delete post |
| GET | /api/vacancies?text=PHP | HH.ru vacancies |

---

## 🇷🇺 Русский

### О проекте

Проект создавался поэтапно в процессе изучения Laravel и PHP backend разработки. Охватывает широкий спектр тем — от базового CRUD до REST API, очередей, событий, кэширования и Docker.

### Функциональность

- Посты с категориями, тегами, анонсами и пагинацией
- Полный CRUD для постов, категорий, тегов и пользователей
- Аутентификация через Laravel Breeze (регистрация, вход, профиль)
- Middleware для администратора — защита маршрутов по роли
- Поиск и фильтрация по автору, категории, тегу
- Сортировка по дате, заголовку, названию категории
- REST API с API Resources (PostResource, VacancyResource)
- Интеграция с HH.ru API — поиск вакансий
- Система очередей с Jobs (`LogPostCreated`, `SendVacanciesNotification`)
- Laravel Scheduler — автоматический запуск задач по расписанию
- Events и Listeners — паттерн Observer
- Кэширование с инвалидацией
- Unit и Feature тесты с фабриками
- Docker — nginx, php-fpm, mysql

### Стек технологий

- PHP 8.4
- Laravel 12
- MySQL 8
- Tailwind CSS
- Docker + nginx

### Установка (локально)

```bash
git clone <repo-url>
cd blog-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run build
php artisan serve
```

Вход: `test@example.com` / `11111111`

### Установка (Docker)

```bash
docker-compose up --build -d
docker-compose exec app php artisan migrate --seed
```

Открыть: http://localhost:8080

### API эндпоинты

| Метод | URL | Описание |
|-------|-----|----------|
| GET | /api/posts | Список постов |
| GET | /api/posts/{id} | Один пост |
| POST | /api/posts | Создать пост |
| PUT | /api/posts/{id} | Обновить пост |
| DELETE | /api/posts/{id} | Удалить пост |
| GET | /api/vacancies?text=PHP | Вакансии с HH.ru |
