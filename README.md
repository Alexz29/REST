# REST

####Create
```
POST, PATCH : /{model_name}/create
```

####Update
```
POST, PUT: /{model_name}/update?id={id}  
``` 
{id} - require param

####Index
```
GET: /{model_name}/index
```

####View
```
GET: /{model_name}/view?id={id}
```
{id} - require param

####Search
```
GET: /{model_name}/search?param1=val&param2=val&param3=val ...
```
