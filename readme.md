# Personal Tasks Manager

---

Test made by me to Docler Holding

User story: "As a user, I want to have an ability to see a list of tasks for my day, so that I can do them one by one". 

API made with PHP 7.4.2, MySQL 8, PHPUnit 8.5.2, Lumen 6

### Installation

   * Run with Docker

```shell script
# PS: wait for PHP-FPM running
docker-compose up
```

   * API Access: http://localhost:8000
   
   * Run migrations database
   
```shell script
docker exec -it task-api-php php artisan migrate
```
   
   * Running Tests: (PS: you will see the coverage in html: ./tests/coverage)
   
```shell script
docker exec -it task-api-php vendor/bin/phpunit
```

   * Tests Directory: https://github.com/vinyvicente/tasks-api/tree/master/app/UI/Tests

### Explaining the test

I made simple and direct DDD separating each boundary in your context, separating the API actions outside from Domain (UI div). Like this, I can change actions instead of change domains, or include new domains.

The application test was made with a database separated in the Docker. Feature tests and Unit tests were made with.

Authentication and authorization with Bearer Token using JWT.

### API Actions

| Action           | Description                | Protected |
|------------------|----------------------------|-----------|
| POST /api/users  | Create user                | No        |
| POST /api/login  | Log User to retrieve token | No        |
| GET  /api/tasks  | List tasks from an user    | Yes       |
| POST /api/tasks  | Create new task            | Yes       |
| PATCH /api/tasks | Update a task              | Yes       |
| DELETE /api/taks | Remove a task              | Yes       | 
