## Installation
1. Unzip the downloaded archive
2. Create a database with name **laravel_universities**.
3. Copy and paste **laravel_universities_app** folder in your **projects** folder. Rename the folder to your project's name
4. In your terminal run `composer install`
5. Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)
6. In your terminal run `php artisan key:generate`
7. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
8. Run `php artisan storage:link` to create the storage symlink (if you are using **Vagrant** with **Homestead** for development, remember to ssh into your virtual machine and run the command from there).
9. Run `npm install && npm run dev` to compile your assets so that your application's CSS file is available.
10. (Optional) For run local execute `php artisan serve`.
## Credits

- [Creative Tim](https://creative-tim.com/?ref=md2ll-readme)
- [UPDIVISION](https://updivision.com)
