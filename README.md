# TODO TEST APPLICATION



## Step one razyAPI - this is back end app

``` bash
# luman framwork 5.5.*
# php 5.6.4
# phpunit 6
````

## Build Setup

``` bash
# install composer in /razyAPI
# copy egample env and create .env 
# creat a database call todo 
# update database configuration in env
# run php artisan migrate - this should result success  
# configur you developemnt envirment eg vagrant 
# I am using local vhost domain name http://todo-api.com/ you can create whatever you wish

```

## API use

``` bash
# list of todos : http://todo-api.com/api/todos
# create new todo:  http://todo-api.com/api/todosCreate 
parmas:[description]
# update todo : http://todo-api.com/api/todosEdit
params:[id,description]
# delete todo : http://todo-api.com/api/todoDelete/{id}
# update status of todo: http://todo-api.com/api/todoStatus/{id}

```


## Run test
````bash
# API project root run composer test, this shoud out put : 
OK (5 tests, 5 assertions)

1. Test Create  todo
2. Test List all todo
3. Test Delete todo
4. Test Edit todo

````



## Step two razyAPP - this is font end app 

``` bash
  "axios": "^0.18.0",
  "cors": "^2.8.4",
  "sweetalert": "^2.1.0",
  "vue": "^2.5.2",
  "vue-resource": "^1.5.0"
````


## Build Setup

``` bash
cd in to razyAPP npm run dev
 update api doamin what ever the domain using for razyAPI app 
 eg Vue.http.options.root = 'http://todo-api.com'
 location :/src/api/api.js
 
```
