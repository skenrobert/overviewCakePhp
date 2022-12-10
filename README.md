# overviewCakePhp

CakePHP Basic Repository

It is a repository with the crud and the login done to start developing you have the route
to add user without outside the protection of the routes.

ejemplos de generar un crud rapidamente:

*Migration:
  1) bin/cake migrations create CreateUsersTable

  2) bin/cake bake migration create_bookmarks title:string description:string url:string url:text create modified

*Generate the seeders: 
  A) bin/cake bake seed --data Users

  B) bin/cake bake seed Users
  
*Quick way to generate the complete crub with index, show, edit, delete.

  Cake bake all users

It is a rapid development framework for small projects, it is not mature for use as an API.
but the rest is very good.

*It has very good plugins like: 

  https://github.com/FriendsOfCake/bootstrap-ui
  https://packagist.org/packages/cakephp/debug_kit
  https://plugins.cakephp.org/m/540-FriendsOfCake
  
  *login is ready this repository 
  
    composer require "cakephp/authentication:2.0"
