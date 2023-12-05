Инструкция по разворачиванию проекта

1. Клонировать проект с репозитория git clone https://github.com/sub3er0/raketa .
2. Установить laravel (cd app) composer create-project --prefer-dist laravel/laravel .
3. docker compose up -d
4. sudo chmod -R 777 . из корня проекта
5. В файле app/.env установить правильные доступы:
```
DB_CONNECTION=mysql
DB_HOST=raketa_db
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=username
DB_PASSWORD=password
```
6. Выполнить php artisan migrate

Папки и файлы, содержащие код задания:
- Описание api маршрутов: api.php
- Сервисы: app/Services
- Контроллеры app/Http/Controllers
- Запросы app/Http/Requests
- Модели app/Http/Models
- Сидеры app/database/seeders (CategorySeeder)

Написал свою упрощенную авторизацию. 
Описание работы через постман с иллюстрациями: 
Регистрация менеджера по маршруту post api/v1/auth/register
![](/var/www/Raketa/images/1.png)

Аутентификация: post api/v1/auth/login
![](/var/www/Raketa/images/2.png)

Необходимо добавить header Authorization, целиком поле plainTextToken из предыдущего шага, и на 
всех действиях, требующих авторизации нужно вставлять токен, соответственно.
Создание пользователя post /api/v1/customer/create
![](/var/www/Raketa/images/3.png)

Создание записи post /api/v1/record/create
![](/var/www/Raketa/images/4.png)

Получение списка записей согласено ТЗ: get /api/v1/record/list
![](/var/www/Raketa/images/5.png)