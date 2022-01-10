# Simple Website Subscription API

A simple subscription platform (RESTful API) where users can subscribe to some listed website.
Whenever a new post is published on the particular website, all it's subscribers shall receive an email with the post title and description in it.

## Project set up
Create Database required (MySQL) and setup in .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_subscription
DB_USERNAME=root
DB_PASSWORD=
```

Install and run the application.
```
composer install

php artisan migrate --seed
```

Run the test.
```
cd root_dir

./vendor/bin/phpunit
```

Run Laravel Server

```
php artisan server
```

Below is the link to the documentations:
```
https://documenter.getpostman.com/view/4984786/UVXgKwYN
```


## Features

- Multiple users can join the chat with their email
- Users can type chat messages to the chat room.
- A notification is sent to users select fir the chat
  the chatroom.
