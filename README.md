Для развертывания приложения необходимо, чтобы были установлены следующие инструменты:
Composer;
Php вресии >= 7.3, а также расширения для него:
BCMath PHP Extension
Ctype PHP Extension
Fileinfo PHP Extension
JSON PHP Extension
Mbstring PHP Extension
OpenSSL PHP Extension
PDO PHP Extension
Tokenizer PHP Extension
XML PHP Extension
_______________________

В файле app/config/database.php прописать настройки (host,port,database,username,password ...) для базы данных

В корневой папке проекта, в терминале выполнить следующие команды:
composer install;
php artisan config:cache
php artisan route:cache
php artisan view:cache

После настроек необходимо выполнить команду php artisan migrate
для того, чтобы все миграции были применены к базе данных

Для запуска на локальном сервере прописать в терминале команду php atrisan serve

