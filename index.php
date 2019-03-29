<?PHP

use Optikos\Optikos;

require_once __DIR__ . '/vendor/autoload.php';

Optikos::setProjectRootUri('http://localhost/myApp/');
Optikos::registerNamespace(['MyApp\model']);
Optikos::setup(
    'mysql:dbname=myapp; port=3306; host=localhost'
    , 'root'
    ,''
    , false);