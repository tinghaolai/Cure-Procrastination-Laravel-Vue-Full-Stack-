# Full-Stack website (Laravel & Vue)
![website-image](https://i.imgur.com/5Rjyt0t.jpg)

Cure-Procrastination is a website that has few tools to stop procrastinate, these tools have some additional functions that can make it easier for people to use. Also we have articles about procrastination so that we can know about yourself more.

## Install

```bash
# clone project to local
git clone https://github.com/tinghaolai/Cure-Procrastination-Laravel-Vue-Full-Stack-.git

#install package
composer install

#install package
npm install

#Making link public folder from storage folder
php artisan storage:link
```

## Enviroment Setup

### Database Connection

```bash
# Create file to connect local database
# Please reference to .env.example and your own database connection
touch .env

# create tables
php artisan migrate
```

### Queues Database Driver

In .env file, you can change `QUEUE_CONNECTION=sync` to `QUEUE_CONNECTION=sync`, so that you can queue your event.


## Usage

```bash
# Adding factory data to articles
php artisan add:testdata

# Cleaning all data
php artisan refresh:tables


```
