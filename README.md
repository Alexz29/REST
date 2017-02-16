# REST
Developed by Alex Diveev

Rest base on Submodules:

- PHP ActiveRecord - Version 1.0

by

@kla - Kien La

@jpfuentes2 - Jacques Fuentes

And these terrific Contributors

http://www.phpactiverecord.org/





##Install
```
git clone https://github.com/Alexz29/REST.git
git submodule init
```

Config path: Config/db.php

```$xslt
'mysql'=>[
        'host'=>'localhost',
        'dbname'=>'',
        'user'=>'',
        'password'=>''
    ]
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
