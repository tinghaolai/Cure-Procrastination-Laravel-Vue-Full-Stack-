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

## Project file structure

### Diagram
![Diagram](https://i.imgur.com/bhZHYOP.png)

### Routing

`web.php` used to let url corresponding to controller and controller's function.
* CRUD
* Webpage view
* Connect to view single page application
  * `Route::get('/{any}', 'AppController@index')->where('any', '.*');`

### Controller

Model part of Model-view-controller

#### CommentController

CRUD for comments table.

#### TagController

CRUD for comments table.

#### ArticleadminController

* Article administrator region controll
    * View - using Laravel blade templates
    * CRUD for articles in Blog region
      * Using repository pattern
        * ArticleadminRepository.php
        * ArticleadminRepositoryInterface.php

### Eloquent (Model)

Access to database.

#### Relationship

Adding Eloquent relationship so that model can call the function to automatically add data to relate table.

e.g. `$article->tags()->attach($tag_id);`

##### Many-To-Many Relationship

Articles and Tags are using `create_taggables.php` to have many-to-many relationship.

### Create Tables

`php artisan migrate` to create tables.

### Factory

Laravel factory to produce fake data.
Usage: `php artisan tinker`
e.g. `factory(App\Article::class,100)->create();`

### Artisan Commands

- `AutoAddingDataForTesting.php` for adding test data
  - Usage: `php artisan add:testdata`
- `RefreshTables` for deleting all data
  - Usage: `php artisan refresh:tables`


### Repository Pattern

Withdraw the logic part from controller and make it clean.


### View
#### Laravel Blade Templates 

View for controllers to display the webpages, files folder `resources\views`.

* Layout - used for most templates
  * under `\layouts` folder
  * using vue component inside blade template
* Blog region
  * under `\artcle` folder
  * using vue component inside blade template
* Administrator region
  * under `articleadmin` folder
* Applications
  * under `\app` folder
  * Most user part directly view using vue-router
  * `index.blade.php`
    * Create vue component that implement single page application for views of website application except Blog.

#### View Component 

Usage for laravel blade templates. files route:  `\resources\js\components`.

* Layout - vue component for layout
  * under `layout` folder
* Blog - vue component for Blog region
  * under `article` folder
* Administrator - vue component for administrator region
  * under `articleadmin`
* Applications - vue component for Applications region
  * under `\`'
  * Clock, To-Do-List, Gallery-API(relax.vue), Homepage, 404not-found(NotFound.vue)
  

#### View Router

Used to implement vue single page application. Router isolate file: `\resources\js\router.js`

### Webpack

`webpack.mix.js` setting files to compile and optimize.

* \resources\js\app.js
  * Main Vue object rendered.
* \resources\sass\app.scss
  * Main Sass file include other component's sass file

#### Sass

- _variables.scss
  - store base color of website
- _layout.scss
  - style sheet for layout
- _articles.scss
  - style sheet for index of Blog
- _article.scss
  - style sheet for article viewing of Blog
- _todo.scss
  - style sheet for To-Do-List application
- _clock.scss
  - style shhet for Tomato-Clock application

### .env

Setting to connect database.

`QUEUE_CONNECTION=database` used to let SQL operation executed asynchronous.


### RepositoriesServiceProvider.php

Used to bind interface file and actually implement class.

* `ArticleRepositoryInterface.php`
* `ArticleAdminRepositoryInterface.php`

### Viewed Event

Counting the viewed time for each article.

1. When article viewed, ArticleController call the function to emit Event: `ArticleViewedEvent`
2. `AddViewedCountListener` is registered in `EventServicePorvider.php`
3. Listener call the function from `ArticleRepository.php` through binding of `RepositoriesServiceProvider.php`.
4. `AddViewedCountListener.php` has implement `ShouldQueue`, SQL operation will be stored in jobs table.
5. `php artisan queue:listen` to execute operations.


### Middleware for Administraor Region

* `Authenticate.php` used to check if user if Signed in.
* `AdminMiddleware` When senting CRUD request, this middleware check if current user belongs to administrator account.



### View::composer 

`AppServiceProvider.php` bind tags table data to blade templates.

### Others
#### SEO friendly URL
#### Seeder
#### Unit Test
#### Laravel Localization (Currently Not Using)
#### Eager Loading
#### Soft Delete
