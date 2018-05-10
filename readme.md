# Reflux

Reflux is a developer-oriented web application for sharing ideas, discussing code, and inspiring others. Contextually, the idea stemmed from disatisfaction with competitive systems with respect to user experience, primarily. From a cyber security point of view, the idea provided the baseline feature-set that would allow me to effectively illustrate security implementations in order to satisfy the objective of my specialisation.

## Getting Started

The following instructions outline the structure of the project for marking purposes, specifically pertaining to the locations of code in relation to the projects defined functional and non-functional requirements, as well as its implementations.

### Prerequisites

Running the project locally requires some meticulous setup if you do not already have Laravel installed on your machine. Such steps will not be covered here. If you do have it setup, feel free to run the project that way! Otherwise, the project is hosted via AWS at the following URL:

[Reflux](www.refluxapp.net)

## Models

Models showcase the projects database tables and any associations drawn between them. These refer to instances such as one-to-one or one-to-many relationships, for instance. They are located within the root of the app folder. For example:
```
app > User.php
```

## Views
Views represent the frontend of the project. In Laravel, the blade templating engine is employed in the creation and use of layout files and partials. They are located:
```
resources > views
```
Each folder within this directory compartmentalises layouts, partials, and the views themselves that pertain to the projects web pages. Those, as encompassed within this directory, pertain to the following:

* layouts - Layout files. Defines the sites layout for a set of views.
* partials - Partial files. Defines reusable UI components.
* posts - Views relating to posts. Post Creation/Modification | Showing all Posts | Show one Post
* profiles - Views relating to user profiles. Settings Page | Showing your own/another User Profile
* registration - Views relating to registration. The Registration Form.
* sessions - Views relating to Login. The Login Form.