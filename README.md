# accoutingCRUD

Making a CRUD app for ViajesParaTi.

![indice](https://user-images.githubusercontent.com/104088479/221428228-e21c648b-e7b0-40ab-bdff-ae826c411822.png)

This app is made with Symfony 6, Twig, MySQL, CSS and Bootstrap

# Install dependencies

Install XAMMP -> COMPOSER -> SYMFONY

Symfony works with commands, so we will need to:

  1. Install the database called "supplies.sql"
  
  2. Check the .env file, in theory it is set up to work on default.
  
  3. We migrate the database
  
        bin/console doctrine:migrations:migrate
        
  4. Once we have all the migrations applied, therefore, once we are satisfied with the update of the ORM configuration, we can run the diff.
  
        bin/console doctrine:migrations:diff
    
  5. We run the server within our web browser using the local path.(Important know the port.)
  
        symfony serve 
        
      
# App

The application will store the data we need for each supplier, which will be the following: 
    
    ● Name 
    ● Email address 
    ● Contact phone number 
    ● Type of supplier, which in our case can be hotel, track, or accessory. 
    ● Whether they are active or not
    ● The creation and modification date.
       
    Finally, we will be able to create, update, and delete records that will be linked to a database.
 
 
 
 ![editar](https://user-images.githubusercontent.com/104088479/221429505-7a2dbbda-881c-4765-8b7d-e85a5a8164db.png)

![crear](https://user-images.githubusercontent.com/104088479/221429510-141c3bf8-98ec-430f-a857-894037368f97.png)


