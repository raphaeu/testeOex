<?php
return [
    [
        'method'     =>   'GET',
        'route'      =>   '/',
        'controller' =>   'HomeController',
        'action'     =>   'index',
    ]
    ,[
        'method'     =>   'GET',
        'route'      =>   '/users',
        'controller' =>   'UserController',
        'action'     =>   'index',
    ]
    ,[
        'method'     =>   'GET',
        'route'      =>   '/user',
        'controller' =>   'UserController',
        'action'     =>   'create',
    ]
    ,[
        'method'     =>   'POST',
        'route'      =>   '/user',
        'controller' =>   'UserController',
        'action'     =>   'store',
    ]
    ,[
        'method'     =>   'GET',
        'route'      =>   '/user/:id/edit',
        'controller' =>   'UserController',
        'action'     =>   'edit',
    ]
    ,[
        'method'     =>   'PUT',
        'route'      =>   '/user/:id/edit',
        'controller' =>   'UserController',
        'action'     =>   'update',
    ]
    ,[
        'method'     =>   'DELETE',
        'route'      =>   '/user/:id',
        'controller' =>   'UserController',
        'action'     =>   'destroy',
    ]

    
];
