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

### Normal User Browsing
```bash
# Adding factory data to articles
php artisan add:testdata

# Cleaning all data
php artisan refresh:tables

# Start server
php artisan serve

# Auto compile front-end files
npm run watch
```
### Administrator Browsing

To access administrator region, go to url: `127.0.0.1:8000/articleadmin/`, the website will ask you to login, you can register any account to browse administrator region, but default administrator e-mail address is `admin@admin`, you'll be able to do the change to website only if you use this account to login.

## Features
Introduce the basic features and fubctions about the website.
### Normal Users
#### 1. Tomato Clock

![Clock](https://i.imgur.com/NV0VO2e.jpg)

Base on Pomodoro Technique, a customizable clock that help users managing time.

#### 2. Count Down To Do List

![Todo](https://i.imgur.com/3MBwyMY.jpg)

A to do list with cound down reminder, another time managing tool, comparing to normal time schedule, it's more flexible and easy to change the plan.

#### 3. Cat Photo Gallery

![Gallery](https://i.imgur.com/KjxfQti.jpg)

A place let users take a break when get too tired. The gallery showing cat photographs that fetched from thecatapi.com. 

#### 4. Blog

![Blog](https://i.imgur.com/EEgyZED.jpg)

A simple blog system to store some articles about procrastination, or other research that help us have a better life.


### Administrator

![Admin](https://i.imgur.com/7U4F7UC.jpg)

An plain design system to let administrator to editing the articles.

> Make it pretty to be user friendly will be next update!

- Access
  - Logged users
    - can only browse the system.
  - Administrator
    - full functionality.
    - defaul email account: `admin@admin`
- Functions:
  - Add/Delete Tags
  - Add Article
    - Upload image
    - Tags choosing
  - Edit Article
  - Delete Article
    - Soft delete
      - Recover
    - Permanently delete
