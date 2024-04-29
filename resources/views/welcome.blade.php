<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StarterPack Laravel API</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body {
                text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
                box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
            }

            .cover-container {
                max-width: 60em;
            }
        </style>
    </head>
    <body class="d-flex h-100 text-center text-white bg-dark">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <div class="mb-auto">
              
            </div>
          
            <main class="px-3">
                <h1>StarterPack Laravel API</h1>
                <p class="lead fs-5 mt-4">Welcome to StarterPack Laravel API! This is a project specifically designed to expedite the development of Laravel-based applications, with a primary focus on API development. By utilizing this StarterPack, you'll have a robust foundation for building reliable and efficient web services using Laravel, one of the most popular PHP frameworks.</p>
                <p class="lead mt-5">
                    <a href="/api/doc" class="btn btn-dark btn-lg border-white">Documentation</a>
                </p>
            </main>
          
            <footer class="mt-auto text-white-50">
              <p>Created by <a href="https://junicochandra.com" class="text-white text-decoration-none"> Junico Dwi Chandra</a> <br> Version 1.0.0</p>
              {{-- <p>Version 1.0.0 | &copy; 2023</p> --}}
            </footer>
        </div>  
    </body>
</html>
