# Reflux

Reflux is a developer-oriented web application for sharing ideas, discussing code, and inspiring others. Contextually, the idea stemmed from disatisfaction with competitive systems with respect to user experience, primarily. From a cyber security point of view, the idea provided the baseline feature-set that would allow me to effectively illustrate security implementations in order to satisfy the objective of my specialisation. 

(Note: This readme is in markdown format. Read it here: [Reflux's GitHub repository](https://github.com/Naxes/Reflux))

## Getting Started

The following instructions outline the structure of the project for marking purposes, specifically pertaining to the locations of code in relation to the projects defined functional and non-functional requirements, as well as its implementations.

### Prerequisites

Running the project locally requires some meticulous setup if you do not already have Laravel installed on your machine. Such steps will not be covered here. If you do have it setup, feel free to run the project that way! Otherwise, the project is hosted via AWS at the following URL:

**URL:** [https://refluxapp.net](https://refluxapp.net)

## Routes

Routes define the projects site-map with respect to page traversal and the execution of controller methods. They are located:
```
routes > web.php
```
These differentiate between what is executed based on the request type sent by the user. For example, when a user creates a new account, there are two controller methods involved. The first is getting the page that contains the form and displaying it. The second, is the post request that actually creates a new record:
```
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
```
In essence, the create method displays the form and the store method creates a new record in the database.

## Model, View, Controller

### Models

Models showcase the projects database tables and any associations drawn between them. These refer to instances such as one-to-one or one-to-many relationships, for example. They are located within the root of the app folder. For example:
```
app > User.php
```
There are also models for posts, comments, votes, and tags. In order to illustrate how these relationships are drawn between each model, take the aforementnioned one for users as an example:
```
class User extends Authenticatable
{    
    /* User has many posts */
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    /* User has many votes */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /* User has many comments */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```
The above is basically defining that a user can have many posts, votes, and comments, respectively. This process is followed for each model.

### Views

Views represent the frontend of the project. In Laravel, the blade templating engine is employed in the creation and use of layout files and partials. They are located:
```
resources > views
```
Each folder within this directory compartmentalises layouts, partials, and the views themselves that pertain to the projects web pages. Those, as encompassed within this directory, pertain to the following:

* **layouts** - Layout files. Defines the sites layout for a set of views.
* **partials** - Partial files. Defines reusable UI components.
* **posts** - Views relating to posts. Post Creation/Modification | Showing all Posts | Show one Post
* **profiles** - Views relating to user profiles. Settings Page | Showing your own/another User Profile
* **registration** - Views relating to registration. The Registration Form.
* **sessions** - Views relating to Login. The Login Form.

### Controllers

Controllers handle the server-side validation and actual manipulation of provided input. They define the methods that are executed based on the request type and route, as shown in the section pertaining to routes. They are located:
```
app > Http > Controllers
```
Thusly, take the controller for registering a new account as an example (RegistrationController):
```
class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(
            request(),
            [
                'name'      => 'required|unique:users',
                'email'     => 'required|unique:users|email',
                'password'  => 'required|confirmed|min:6'
            ]
        );

        $user = User::create(
        [
            'name'      => request('name'),
            'email'     => request('email'),
            'password'  => Hash::make(request('password'))
        ]);

        auth()->login($user);

        return redirect('/');
    }
}
```
The above represents the create and store methods referenced in the routes file shown before. Create simply returns a view, and is executed when a GET request is sent. Store creates a new user record if all stipulations are satisfied, and is executed when a POST request is sent. This also illustrates how records are validated and created using the Eloquent ORM. Additionally, the constructor method that precedes these showcases how the project uses middleware to gate or allow access to these methods based on the user type (guest or authenticated).

## Assets

### JavaScript
The projects segmented JavaScript implementations are located:
```
resources > assets > js
```

### Sass
The projects main and partial Sass files are located:
```
resources > assets > sass
```

### Compiling Assets

In both the cases of the aforementioned, JavaScript and Sass, each main file is comprised of many sub-components that, in production, are merged into a singular file. The precursor to this, is specifying an input and output file for each within the mix file located in the root of the project as webpack.mix.js:
```
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
```
The above is the contents of this file. Both the main JavaScript and Sass files located in the assets folder are the input files, while the output files are located:
```
public > js OR css
```
This structure allows for compartmentalisation of components while the production files appear as a single file. This is done by watching for changes in either input file via the following NPM command:
```
npm run watch --watch-poll
```
Whenever changes are made to these asset input files, said changes are reflected in the output public files.

## Database

### Establishing a Connection

The database the project uses when tested locally is defined within the projects environment file located in the root of the project as .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reflux
DB_USERNAME=root
DB_PASSWORD=root
```
The above is the vital data encompassed by this file that defines the database to be used.

### Creating Migrations

Migrations refer to the projects database table schema. For each table there is an associated schema that defines their columns. They can be created using the PHP artisan command line tools:
```
php artisan make:migration create_users_table
```

### Migrating Tables

When created, migrations are located:
```
database > migrations
```
In development, tables can be migrated to a database using the PHP artisan command line tools:
```
php artisan migrate
```

### Seeding

During development, the database was populated with dummy data. This was done using the Database Seeder class located:
```
database > seeds
```
Within, tables can be referenced and populated with data when refreshing migrated tables with the following PHP artisan command:
```
php artisan migrate:refresh --seed
```
Take the following example representing a seeded user account:
```
class UsersTableSeeder extends Seeder 
{
    public function run() 
    {
        DB::table('users')->delete();        

        User::create(
        [
            'name'      => 'TestUser',
            'email'     => 'testuser@example.com',
            'password'  => Hash::make('password')
        ]);        
    }
}
```

## Unit Testing

HTTP unit tests were used to affirm that the access control and authorisation enforcements of the project worked within different contextual circumstances. These can be run if using the project locally. They are, however, located:
```
test > Unit 
```

### Running the Tests

Tests can be run via local instance of the project using the following terminal command within the root of the project:
```
vendor/bin/phpunit
```

## Deployment

As established, the site is hosted via AWS. The domain name was purchased, and the project files uploaded using the Elastic Beanstalk service.

### Database Configuration

Location of the database configuration file:
```
config > database.php
```
Globals were defined in the projects database configuration file to equate to those as provided by the server:
```
define('RDS_HOSTNAME', $_SERVER['RDS_HOSTNAME']);
define('RDS_USERNAME', $_SERVER['RDS_USERNAME']);
define('RDS_PASSWORD', $_SERVER['RDS_PASSWORD']);
define('RDS_DB_NAME', $_SERVER['RDS_DB_NAME']);
```

### YAML Command

In order to migrate the tables to the AWS database, a YAML command was used. AWS interprets a hidden directory contained within the project structure called EBExtensions. Within this was an initialisation configuration file comprising of the YAML command:
```
container_commands:
    01initdb:
        command: "php artisan migrate"
```
This migrates the tables for the first time. For any subsequent updates to the code that are re-uploaded to AWS, the command was replaced to instead refresh the tables and seed the database with the data encompassed by the Database Seeder:
```
container_commands:
    01initdb:
        command: "php artisan migrate:refresh --seed"
```

### Redirect HTTP to HTTPs

An SSL certificate was acquired via the AWS Certificate Manager to enforce HTTPs. However, both HTTP and HTTPs versions of the site were navigable. Thusly, the following config file was created in EBExtensions:
```
files:
    "/etc/httpd/conf.d/ssl_rewrite.conf":
        mode: "000644"
        owner: root
        group: root
        content: |
            RewriteEngine On
            <If "-n '%{HTTP:X-Forwarded-Proto}' && %{HTTP:X-Forwarded-Proto} != 'https'">
            RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [R,L]
            </If>
```

## Technologies
* [Laravel](https://laravel.com) - PHP Framework
* [Semantic UI](https://semantic-ui.com) - CSS Framework
* [Sass](https://sass-lang.com) - CSS Pre-Processor
* [jQuery](http://jquery.com) - JavaScript Library
* [Sequel Pro](https://www.sequelpro.com) - OSX Database Management Application
* [Visual Studio Code](https://code.visualstudio.com) - IDE
* [Amazon Web Services](https://aws.amazon.com) - Deployment Platform

## Author

* **Seán Bickmore**