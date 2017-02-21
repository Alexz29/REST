# REST
Developed by Alex Diveev

Rest base on Submodules:

* PHP ActiveRecord - Version 1.0
http://www.phpactiverecord.org/





##Install
```
git clone https://github.com/Alexz29/REST.git

php composer.phar update
```

Config path: Config/db.php

```$xslt
// '<connection-name>'=>"<driver>://<user>:<password>@<host:port>/<db-name>"
```



##Create model

Models path Models/<model_name>.php

Examle: Models/Post.php
```php
<?php
namespace Models;
use ActiveRecord;

class Post  extends ActiveRecord\Model
{
    // explicit table name since our table is not "books"
    static $table_name = 'yii_post';

    // explicit pk since our pk is not "id"
    static $primary_key = 'id';

    // explicit connection name since we always want production with this model
    static $connection = 'production';
}
```


##Run
```$xslt
php -S localhost:6100
```




##Example

####Create
```
POST, PATCH : localhost:6100/{model_name}/create
```

####Update
```
POST, PUT: localhost:6100/{model_name}/update?id={id}  
``` 
{id} - require param

####Index
```
GET: localhost:6100/{model_name}/index
```

####View
```
GET: localhost:6100/{model_name}/view?id={id}
```
{id} - require param

####Search
```
GET: localhost:6100/{model_name}/search?param1=val&param2=val&param3=val ...
```
