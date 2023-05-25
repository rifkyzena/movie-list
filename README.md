# Movie List

Movie List is a simple web application that provides information about popular movies all over the world. This website enables the user to add the movie to their watchlist. There are three types of user’s role in this website: Guest (non-logged-in user), User, and Admin. Movies can be sorted and arranged to different categories and this website also provides short biography of the actors starring in each movies. Admins can add a movie or an actor to the database while users are able to put a movie into their watchlist. Admins are also able to edit existing movies in the database; updating them or deleting them. This web application was made by HTML, CSS and JS with PHP logic and Laravel 8 Framework that uses MySQL to connect to the database.

Movie List was built with Model View Controller (MVC) architecture.

# Startup Guide
1. Install XAMPP, then start Apache and MySQL module (make sure these two modules are active, otherwise the application can't connect to the database and won't start).
2. Go to http://localhost/phpmyadmin/.
3. Create a database named 'db_movie'.
4. Open the project's directory in a terminal and run the command: 
    - *php artisan migrate:fresh --seed* (to drop all tables then migrate new tables to the database, and seed the database from the seeder files)
    - *php artisan serve*
5. Open the link given after the last command to open the web application.

Below is the preview and/or flow of the application:

# (1/13) Login
This page allows user to log in to the website.
If user has entered correct Username and Password, the page will be redirected to the Home Page for User or Admin based on the user’s role and if user checks the “Remember Me” checkbox, the website will save the Username and Password using cookies for 2 hours.
![image](https://github.com/rifkyzena/movie-list/assets/55536824/c049704a-1a1d-47da-951b-1bce2b62dccf)

# (2/13) Register
This page allows guests to register themselves as Movie List User.
![image](https://github.com/rifkyzena/movie-list/assets/55536824/1175e491-201d-4e04-96ef-165f4f185c34)

# (3/13) Home Page
This page allows user to see all Movie list on the website. This page is accessible for all users.  There are three sections in the homepage, such as hero section, popular section and movie sections. In the hero sections, there are three movies generated randomly with carousel. In popular section, the movie generates based on watchlist count (it will be sorted by counting how many the movie added to watchlist). In the movie sections, there are search-bars, genres, sorted by and the movie itself.  In the search bar, the user can search the movie they want. Same with genres, and sorted button, when the button is clicked, then the movie will be sorted by these categories. 

## a. Guest
![image](https://github.com/rifkyzena/movie-list/assets/55536824/3095e7b4-525d-46e3-8de6-62609b7410a8)
- As a guest, we can only look at the movie list and look at the movie detail.

## b. User
![image](https://github.com/rifkyzena/movie-list/assets/55536824/5d63bc0c-102e-46a2-9d6e-77e7540929d3)
- As user, there are add and remove to watchlist feature that placed in the heroes section and + button for every movie (when the movie is not added to watchlist), ✓ button (when movie is already added to watchlist). When the button is clicked, then it will add the movie to the watchlist. There’s also watchlist in the navbar when logging as user.

## c. Admin
![image](https://github.com/rifkyzena/movie-list/assets/55536824/db1083d5-abb8-413e-854f-7ee91b326c38)
- As admin, there are new features to add movie. If we click the add Movie button, it will redirect to create movie page. As an admin, there’s no need to have a watchlist, then the watchlist navbar is removed.

# (4/13) Create Movie Page
![image](https://github.com/rifkyzena/movie-list/assets/55536824/37f3471d-d620-4a47-989e-d8276b141da9)
This page is only accessible by admin. As admin, we can add movie to the database by input all the fields in the page. There are title, description, genre, actors, director, release date, image url for the image thumbnail and background image. For the image url and background image, we can choose the files from our storage.

# (5/13) Edit Movie Page
![image](https://github.com/rifkyzena/movie-list/assets/55536824/ee5322a8-eb9b-4c54-924b-532fb8adb87f)
<br> This page is only accessible by admin. As admin, we can edit movie to the database by input all the fields in the page. There are title, description, genre, actors, director, release date, image url for the image thumbnail and background image. For the image url and background image, we can choose the files from our storage.

# (6/13) Movie Detail Page
In this page, we can view the movie detail such as production year, description, director and the genres in the header section. In the cast section, it shows all the cast for the movie. In more sections, it shows more movies

## a. Guest and User
![image](https://github.com/rifkyzena/movie-list/assets/55536824/ebc964ef-4982-4f89-b651-d009b4f71d5f)
- For Guest, we can only view the movie detail. However, for User, we can add and remove the movie to the watchlist by click the + / ✓ button in the movies section.

## b. Admin
![image](https://github.com/rifkyzena/movie-list/assets/55536824/0a0aec72-cc74-41ab-9090-449069c4865d)
- For admin, there are two new features for update and remove movie. When the user click the update button, it will redirect to update movie page, while when clicking the remove button, it will remove the movie from the database.

# (7/13) Actor Page
In this page, we can view all the actors that exists in the database. For every actor, it presented by cards that showed the actor name and the movie they played. There is also a search-bar that used to search actor. To make the website better, you could use Lazy Loading (when the user reaches the bottom part of the website, render more actor that haven’t shoved).

## a. Admin
![image](https://github.com/rifkyzena/movie-list/assets/55536824/5295c59e-99b2-4cff-9379-8cbd28eb5a18)
- For admin, there are one added feature for create actors. When the user clicks the add-actor button, it will redirect to create actor page.

## b. Guest and Member
![image](https://github.com/rifkyzena/movie-list/assets/55536824/218059a8-71a0-4b93-a356-1a9f21e62b4c)
- For guest and user, we can only view all the actors.

# (8/13) Actor Detail Page
In this page, it will show the actor information such as popularity, gender, birthday, place of birth, biography, and movie they played on.

## a. User and Guest
![image](https://github.com/rifkyzena/movie-list/assets/55536824/df00518f-0d30-47f6-93cb-416ede59abf4)
- For User and guest, the user can only view the actor personal detail.

## b. Admin Page
![image](https://github.com/rifkyzena/movie-list/assets/55536824/2f1e44a2-e4b6-49ac-94a9-602ba65d10ec)
- For admin, there are two added features to edit and delete the actor personal detail.

# (9/13) Create Actor Page
![image](https://github.com/rifkyzena/movie-list/assets/55536824/9cccd7cc-2431-41f0-8cc7-74cb128e05d3)
<br>This page is only accessible by the admin. There are some fields that needs to be filled such as name, gender, biography, date of birth, place of birth, image and popularity.

# (10/13) Edit Actor Page
![image](https://github.com/rifkyzena/movie-list/assets/55536824/bd59307c-7b34-4c91-8896-d64560542ee7)
<br>This page is only accessible by the admin. There are some fields that needs to be filled such as name, gender, biography, date of birth, place of birth, image and popularity.

# (11/13) Profile Page
![image](https://github.com/rifkyzena/movie-list/assets/55536824/0d0df085-a0cb-44e2-85cf-756f88a2d44a)
<br>This page is only accessible by user that already logged in. There are some information that can be updated like username, email, dob and phone. When the user clicks the profile, there will be a modal that showed a form to update the image.
![image](https://github.com/rifkyzena/movie-list/assets/55536824/e67a4838-8f9e-44dc-8114-d07ba5aa4502)

# (12/13) Watchlist Page
![image](https://github.com/rifkyzena/movie-list/assets/55536824/c9f0bec6-f6f7-4b94-b32e-e2605f9ff7f0)
<br>In this page, it will show the user watchlist. This page is only accessible by the user that already logged in. There is a search bar that can be used to search a certain watchlist (search by title). For the status, when a movie added to watchlist, the status will be planning.  There is also a pagination in this page. For every watchlist, there will be an action button that placed in the right side of the card, when we click the button, it will show a modal that used to update the watchlist status.

![image](https://github.com/rifkyzena/movie-list/assets/55536824/fe2a069c-0399-4adb-a5b0-62d85eac1178)
![image](https://github.com/rifkyzena/movie-list/assets/55536824/6b1f3295-33b0-4e43-bbd8-0855a72eaa47)

<br>In this modal, if we can change the status by selecting planned, watching or finished. However, If we select remove then it will remove the watchlist.
<br>![image](https://github.com/rifkyzena/movie-list/assets/55536824/b1e877e3-0605-4c80-ae56-968fe858c411)
<br>In this page, we can sort the movie list by all, planned, watching and finished. If we choose planned, then it will show all the movie which has status of planning. 

# (13/13) Navbar Dropdown
![image](https://github.com/rifkyzena/movie-list/assets/55536824/a3140734-0f21-478c-861c-2b42ca4cac7d)
<br>When the user avatar clicked, then it will show the dropdown with profile and logout. If we click on the profile then it will redirect to profile page, while if we press the logout then it will logout from the account.
































