# Tech Challange

## A RESTful API for a task management application (to-do list)

### Sumary

1. API documentation
2. Testing Online (with leticiamarinho.online link) infos
3. Technologies
4. BoilerPlate
5. How to use on your machine
    - Cloning
    - Setting Environment Variables
    - Running
6. Tests
    - Unit
7. Important Informations

## **1. API documentation**
A documentation was created in the postman and made available at this link:

https://documenter.getpostman.com/view/8202053/2s9Xy5Kpzc
## **2. Testing Online (with leticiamarinho.online link) infos**
- Remember to use the ``/api`` before the ``/tasks`` and authentication routes.
-  To test online on postman, use https in the route to work correctly. Ex: https://leticiamarinho.online/api/login/
- **The authentication info for login in is:**     
    email : test@example.com    
    password: password
- Obs: links to display images are having problems.

## **3. Technologies**
1. PHP 8.1
2. Laravel 10.10
3. JWT (tymon/jwt-auth) 2.0
4. MYSql 8.0
6. PHPUnit 10.1
7. Docker

## **4. Boilerplate**

With the use of laravel, there are folders and files that are default.
Code that was made/changed by me is located in the following folders:

```
.
├── app                    
│   |
│   ├── Http                                    # Here
│   ├── Models                                  # Here
│   ├── Repositories                            # Here
│   └── Services                                # Here
│   └── ... 
├── config
├── ...
├── database                                    # Here
|
├── nginx               
├── ...
├── routes                                      # Here
├── ...
├── tests                                       # Here
└── .env                                        # Here
└── docker-compose.yaml                         # Here
└── Dockerfile                                  # Here
└── DockerFile-dependency-manager-composer      # Here
└── .env.testing                                # Here
└── .gitignore                                # Here
```

## **5. How to use on your machine**

#### Cloning
- Install Docker in your location [Docker site](https://docs.docker.com/desktop/).
- Clone this repository.

#### Setting Environment Variables
-  Copy the .env.example to the .env file
#### Rodando

```
Warning: It is not necessary to run commands to install project dependencies as there is already an automatic configuration together with the docker settings.
```

```
Observation: Stop the local apache and mysql for ports 8080 and 3306 be used for the project.
```

- Run this `docker compose up` command in the root folder (where the docker-compose.yaml file is).
- Use your local IP to use the backend routes that are in the url listed in the topic `API documentation`
- You already have migrations and seeders ready to use! to use them it is necessary to do the step by step mentioned in the `topic tests` to enter the container and then run the command `php artisan migrate --seed`.

## **6. Tests**
- Unit

    Unit tests were applied to ensure correct behavior in the smallest pieces of code, which in this project are found in `Services`.

    To run the tests, enter the container of the back-end project `container name: app` using the command `docker exec -it ID_DO_CONTAINER bash` and use artisan to run the tests with the command `php artisan test`.


## **7. Important Informations**

- Authentication has been added so that it is possible to create a user and then use the task routes, so that the project is functional with the routes.

- In the Postman, on update route, the POST method is being used because of the body form-data type, in order to send an image in the body. Note that the PUT method is being set in the body of the route so that it reaches the route that has PUT as a method.

- Because it is a technical challenge, I put the .env.example with information that in a real project, this information should not be public. They are only in this location to be easy to test the project.
