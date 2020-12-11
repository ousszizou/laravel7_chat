# Laravel 7 - Realtime Chat Application

You can watch the serie on my YouTube channel via this link 👉 [دورة تعلم ﻻرافيل 7 | Learn Laravel 7](https://www.youtube.com/playlist?list=PLfDx4cQoUNObqJzxBKEst6Sd8uw6C2qSK)

## Instructions

To see the course files, make sure you select the appropriate branch. E.g. to see lesson 7 code you would select the lesson-7 branch. Happy coding :)

## What you'll learn from this project

* Multi-Authentication (3 methods) [*]
* Email Verification [*]
* Password Reset [*]
* Localization (with & without packages: mcamara)
* Queues & Jobs
* Notifications
* Factories & Seeders [*]
* Permissions (spatie [*] - laravel bouncer - laratrust)
* Livewire
* Laravel Realtime (socket.io - pusher - websockets)
* Admin Panel Generator (Voyager)
* Laravel Socialite
* Laravel Sanctum
* Algolia Search
* API
* Blueprint Package [*]
* SweetAlert2
* SPA (Vue.js)

- App1 : Laravel with livewire
- App2 : Laravel with Vuejs

## Progress

* Setup up a new laravel project [*]
  ```console
    laravel new chat
  ```

* Setup the database [*]

* Run the migration [*]
  ```console
    php artisan migrate
  ```

* Add git to our project [*]
  * ```console
      git init
      ```
  * Edit README.md file
  * ```console
      git add .
      git commit -m ":tada: First Init"
      git remote add origin https://github.com/ousszizou/laravel7_chat.git
      git push origin master
      ```

  ### App1 (Laravel with livewire)
    * ```console
        git branch develop_app1
        git push origin develop_app1
        ```

  ### App2 (Laravel with Vuejs)
    * ```console
        git branch develop_app2
        git push origin develop_app2
        ```


### App1 (Laravel with livewire)

* Add tailwindcss with auth [*]
  * ```console
      composer require laravel-frontend-presets/tailwindcss --dev
      php artisan ui tailwindcss --auth
      npm install && npm run dev
      ```

* Working with Multi-Auth (users - admins - moderators) [*]
  * ```console
      git checkout -b app1_multiAuth_m1
      php artisan make:model Admin -m
      php artisan make:model Moderator -m
      php artisan migrate
      ```
  * Add custom guards
  * Add Controllers & Modify guest middleware
    ```console
      php artisan make:controller Auth/AdminLoginController
      php artisan make:controller Auth/ModeratorLoginController
      ```
  * Add Routes
  * Add middleware & register it
    ```console
      php artisan make:middleware AssignGuard
      ```
  * Add Templates (adminLogin, ...)

* Working with Multi-Auth - method 2 [*]
  * ```console
      git checkout -b app1_multiAuth_m2
      ```
  * Edit User (model & schema table) & do migrate
  * Our user role is going to be numerical as follows :
    1. Admin
    2. Moderator
    3. user
  * Set up database seeders to fill our database (seeder & factory)
    * Generate seeders
      ```console
        php artisan make:seeder AdminSeeder
        php artisan make:seeder ModeratorSeeder
        php artisan make:seeder UserSeeder
        ```
    * Running Seeders
      ```console
        composer dump-autoload
        php artisan db:seed
        ```
  * Creating Dashboard Controllers
    ```console
      php artisan make:controller AdminController
      php artisan make:controller ModeratorController
      ```
  * Creating Middlewares & register them
    ```console
      php artisan make:middleware Admin
      php artisan make:middleware Moderator
      ```
  * Edit guest middleware
  * Add middlewares to constructor of dahsboard controllers
  * Edit Login controller
  * Setting up views & routes
  * Test Our Multiple role-based Authentication 🎉






* Gates and Policies in Laravel [*]
  * Working with Gates
    - Create Post Model & migration & define relation
      => php artisan make:model Post -m
      => relationship is One to Many
    - Create Seeder:
      => php artisan make:seeder PostSeeder
      => php artisan make:seeder UserSeeder
    - Create Factory:
      => php artisan make:factory PostFactory --model=Post
    - Run migration
      => php artisan migrate
    - Run seeders:
      => php artisan db:seed
    - Create routes & views
      => create /posts route
      => php artisan make:controller PostController
      => create posts.blade.php file in views folder
  * Working with Policies
    - Create a new branch:
      => git checkout -b app1_authorization_policies
    - Generate a policy:
      => php artisan make:policy PostPolicy
      => php artisan make:policy PostPolicy --model=Post
    - Register The generated policy in AuthServiceProvider
    - Play with Policies 

* Working with Multi-Auth - method 3 [*]
  * ```console
      git checkout -b app1_multiAuth_m3
      ```
  * Install and Configure of “spatie/laravel-permission”
    ```console
      composer require spatie/laravel-permission
      php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
      php artisan config:clear
      php artisan make:model Admin -m
      ```
    * working with render() in app\Exceptions\Handler.php
    * working with app\Http\Kernel.php (add role middleware)
    * working with configurations files (project.php & .env)
    * working with seeds
      ```console
      php artisan make:seeder UserSeeder
      php artisan make:seeder AdminSeeder
      ```
    * Run Commands
    ```console
    php artisan cache:clear
    php artisan migrate:fresh --seed
    ```
    * Working with Guards
    * Working with Routes
    * Working with Controllers
    * Working with Middlewares (AssignGuard, guest)
    * Working with Views
    * Test It.
    
* Email Verification [*]
  * Merge multi-auth m3 with our main development branch
    ```console
      git checkout develop_app1
      git merge app1_multiAuth_m3
      ```
  * Create a new branch for Email Verification feature
    ```console
      git checkout -b app1_email_verification
      ```
  * See Email Verification section on Laravel Documentation
  * Set up the email configuration in the .env file (FOR TESTING ONLY)
  * Test It!

* Password Reset [*]
  * Merge app1_email_verification with our main development branch
    ```console
      git checkout develop_app1
      git merge app1_email_verification
      ```

  * Create a new branch for Password Reset feature
    ```console
      git checkout -b app1_password_reset
      ```

  * Configure MailTrap.
    * Edit .env file
    * ```console
      php artisan config:clear
    ```

  * Update password broker in config/auth.php
  * Add ForgotPasswordAdminController & ResetPasswordAdminController for Admins.
  * Override Broker & showLinkRequestForm in ForgotPasswordAdminController
  * Update redirectTo property, showResetForm, broker, guard in ResetPasswordAdminController
  * Add Routes in web.php
  * Add passwords folder for admins.
  * Edit admin login form.
  * Override sendPasswordResetNotification function in Admin model.
  * Create notification for admins
    ```console
      php artisan make:notification AdminResetPasswordNotification
    ```

* Use Blueprint Package [*]
  * Merge app1_password_reset with our main development branch
    ```console
      git checkout develop_app1
      git merge app1_password_reset
      ```
  * Create a new branch for use Blueprint Package
    ```console
      git checkout -b app1_use_blueprint_package
      ```
  * Install Blueprint Package via composer
    ```console
      composer require --dev laravel-shift/blueprint
      composer require --dev jasonmccreary/laravel-test-assertions
      ```
  * Ignoring Blueprint files
    ```console
      echo '/draft.yaml' >> .gitignore
      echo '/.blueprint' >> .gitignore
      ```
  * Blueprint Commands
  * Defining Models
  * Defining Controllers
  * Blueprint Configuration

* Localization (with & without packages: mcamara) []
  * Add Progress.md file to repo.
  * Be sure you are in develop_app1
  * Create a new branch for localization without package
    ```console
      git checkout -b app1_localization_without_package
      ```
  * Eat The Doc (tasty :yum:)
  * Do a quik sample
    - create Translation Strings As Keys (resources/lang)
    - create a route group (web.php)
    - create a middleware & register it in kernel
      ```console
        php artisan make middleware SetLocale
      ```
    - create a test view (resources/views/)




### App2 (Laravel with Vuejs)

* Working with Multi-Auth API (users - admins - moderators) []
  * ```console
      git checkout -b app2_multiAuth
      ```
  * Add JWT-Auth Package








































