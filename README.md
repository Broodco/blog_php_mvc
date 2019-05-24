# BLOG_PHP_MVC

## What's this repository about?

This repository contains an object-oriented, following the MVC architecture, PHP blog.

## Contents

### Router

The router of this project is contained in the _index.php_ file.
According to the action parameter contained in url parameters, the router calls a function imported from the **Controller** part of the application.

### Controller

The _controller/frontend.php_ file lists every function needed to execute the query.
First, some classes are imported from the **Model** part of the app, then, to future-proof the app, it uses _namespaces_ to call and instantiate those classes.

Each function follows a similar architecture : First, it instantiates the needed model(s), then call the model's method(s) and store the result into a variable. Finally, a verification is made if needed, and the controller redirects to the needed **View**.

### Models

The _models_ use namespaces as well.
Here, let's see how the classes called and instantiated by the _controller_ work.
A main class, here called _Manager_ is imported. It contains the method used to connect the app to the database.
This class is then extended to the type of model we need. And methods doing the query to the database and returning the needed values are defined here.

### Views

The named views first define the page title, then generate the view rendered in the browser. To facilitate the process and get a clean and constant result, a _template_ file is imported (and thus, the style of the app is normalized).
