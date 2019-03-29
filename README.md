###optikos sample app

clone the repo

    git clone https://github.com/jtuller/myApp.git
    
install the optikos library with composer
    
    composer update
    
dump the autoload file
    
    composer dump-autoload -o
    
confirm the database setup string is correct for your database in the index.php file

    Optikos::setup(
        'mysql:dbname=myapp; port=3306; host=localhost' // change as needed
        , 'root'
        ,''
        , false)
        
to see optikos in action, visit:

    http://localhost/myapp/optikos
    
    
default log path for optikos is here:

    /tmp/logs/optikos
    
