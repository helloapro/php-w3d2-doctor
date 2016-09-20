<?php
date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Doctor.php";
    require_once __DIR__."/../src/Patient.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $server = 'mysql:host=localhost;dbname=clinic';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('home.html.twig', array('doctors' => Doctor::getAll(),'patients' => Patient::getAll()));
    });

    // $app->post("/doctors", function() use ($app) {
    //     $category = new Doctor($_POST['category_name']);
    //     $category->save();
    //     return $app['twig']->render('home.html.twig', array('doctors' => Doctor::getAll()));
    // });
    //
    // $app->get("/animals/{id}", function($id) use ($app) {
    //     $category = Doctor::find($id);
    //     return $app['twig']->render('animals.html.twig', array('category' => $category, 'animals' => $category->getAnimals()));
    // });
    //
    // $app->post("/animals/{id}", function($id) use ($app) {
    //     $category = Doctor::find($id);
    //     $id = null;
    //     $name = $_POST['animal_name'];
    //     $breed = $_POST['breed'];
    //     $gender = $_POST['gender'];
    //     $date_admitted = $_POST['date_admitted'];
    //     $category_id = $_POST['category_id'];
    //     $animal = new Animal($id, $category_id, $name, $breed, $gender, $date_admitted);
    //     $animal->save();
    //     return $app['twig']->render('animals.html.twig', array('category' => $category, 'animals' => $category->getAnimals()));
    // });
    //
    // $app->get("/by_name", function() use ($app) {
    //     $category = new Doctor('All Animal');
    //     $doctors = Doctor::getAll();
    //     return $app['twig']->render('animals.html.twig', array('animals' => Animal::getAll(), 'category' => $category, 'doctors' => $doctors));
    // });

    return $app;
?>
