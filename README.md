### Requirements for Clone from Git (With HTTPS)
- `git clone -b develop https://github.com/mostafayavari94/Laravel-API-get-information-of-countries.git`
- Go to the folder application using `cd` command on your cmd or terminal
- Run `composer install` on your cmd or terminal
- Run `cp .env.example .env`
- Open your `.env` file and change the database name (`DB_DATABASE`) to whatever you have, username (`DB_USERNAME`) and password (`DB_PASSWORD`) field correspond to your configuration.
- Config your default Email provider
- Run `php artisan key:generate`
- Run `php artisan migrate`