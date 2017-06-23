Symfony Api Test App
========================

This is a very simple symfony app that returns data of a user with API calls.


Installation
--------------

  * Clone the repository

  * Run composer install

  * Fill in the mysql credentials in app/config/parameters.yml (the database name must not exist, it will be created in the process)

  * Run the install.sh script. This will instantiate the database and populate it with 2 sample users

Usage
--------------

  * Do an HTTP request (Using Postman or otherwise) using the header X-symfony-api-key to provide the API key


Online Resources Used
--------------

Acquainting myself with symfony took the majority of time, so I mainly used their documentation pages.

  * https://symfony.com/doc/current/controller.html
  * https://symfony.com/doc/current/doctrine.html
  * http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/basic-mapping.html
  * https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html

Concerns
--------------

Api key should not be stored like that in base.
Just followed instructions, but otherwise the data should be encrypted

Used the whole symfony framework. The assignment could probably be done with individual 
components and not be so bulky. However since I was not familiar with symfony, it was the most efficient way to act.
