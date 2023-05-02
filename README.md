<div style="display:flex;text-align: center; width:100%">
  <img align="center" src="images/blog1.png" style="width:20%">
</div>
# Introduction
<b>.bloge</b> is a website built using PHP that uses role-based access control to provide different levels of access . The site has three main roles:admins ,editors and users, each with different permissions for CRUD on Articles,groups and users. The site is designed to be secure,efficient,flexible and scalable.
## Installation & Project Run
<pre>
git clone https://github.com/AhmedSamir99/Article_Project.git
</pre>

### Database creation
- create database
- import articles_system.sql
- create config.php


```
<?php
define("HOST","localhost");
define("USER",database_username);
define("PASS",database_password);
define("DB",database_name);
define("RECORDS_PER_PAGE",10);
define("Debug__Mode",0);
define("MIN_LENGTH",3);
define("MAX_LENGTH",20);
define("PASS_MIN_LENGTH",5);
define("PASS_MAX_LENGTH",20);
define("MOBILENUMBER_MIN_LENGTH",11);
define("SUMMARY_MIN_LENGTH",10);
define("SUMMARY_MAX_LENGTH",100);
define("body_MIN_LENGTH",10);
define("body_MAX_LENGTH",250);
define("Image_MAX_SIZE",5000000);

```

<pre>
composer install
</pre>

<pre>
composer dump-autoload
</pre>



## Features

- User authentication and Remember me option.
- User profile.
- Role-based access control.
- Article creation, reading and deletion.
- CRUD operation on Users and Groups.
- soft delete.
- Search and filtering and Pagination of all tables.
- Responsive design .
- Chart statistics and analysis.
- Error and exception logging

## Technologies
- PHP
- MySQL
- JS
- Bootstrap
- CSS3
- HTML5

## Packages
- [monolog](https://github.com/Seldaek/monolog)
- [psr log](https://github.com/php-fig/log)
- [Chart.js](https://www.chartjs.org/)

## Roles 

 Admin ----> Full access <br>
 Editor ---> Full access on articles - View Groups <br>
 User ---->Create and view their own articles 

## ScreenShoots Samples
![image](https://user-images.githubusercontent.com/104720889/235434643-331246aa-49f1-4b98-a405-17ffe541407a.png)

![image](https://user-images.githubusercontent.com/104720889/235434741-a93349fd-3e36-4a6d-8d8a-85b3235774e8.png)

![image](https://user-images.githubusercontent.com/104720889/235434832-80b8346f-1677-416f-9255-db62b3663d9f.png)

![image](https://user-images.githubusercontent.com/104720889/235434935-20aa6135-eeb2-4564-a5e1-218b5d3ba4a4.png)

![image](https://user-images.githubusercontent.com/104720889/235435006-ed2f314d-4f83-4f89-8274-0e50ecc93965.png)

![image](https://user-images.githubusercontent.com/104720889/235435123-d6365524-6b19-4c55-96b0-75faeebbae49.png)

![image](https://user-images.githubusercontent.com/104720889/235435271-bb3c7c5b-79b6-4c15-b723-80f1fe908737.png)

![image](https://user-images.githubusercontent.com/104720889/235435595-e735e300-c611-4d64-92e0-c81db4dbdd2d.png)

## Video Demo 

### [![Website Demo Video](https://user-images.githubusercontent.com/104720889/235644316-4444e08e-7888-4876-addc-c1ac77abbb71.png)](https://youtu.be/nqhwoZzCwZw) 


## Authors

- [Rannen Mahmoud](https://github.com/raneenmahmoud)

- [Nada Alaa](https://github.com/NadaAlaaEldeen)

- [Ahmed Samir](https://github.com/AhmedSamir99)

- [SamarSamy](https://github.com/SamarSamyE)

- [Wafaa Muhammad](https://github.com/wafaamuhammad123)
