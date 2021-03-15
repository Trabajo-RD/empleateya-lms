<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso aprobado</title>

    <style>
        h1 {
            color: #003876;
        }
    </style>
</head>
<body>
    <h1>RD Trabaja</h1>
    <p>Slogan</p>

    <div>
        <h2>Hemos aprobado tu curso</h2>

        <p>
            El curso <a href="http://empleateya-lms.test/cursos/{{$course->slug}}" target="_blank"><strong>{{$course->title}}</strong></a> para el que solicitaste revisión en nuestra plataforma LMS,
            ha sido aprobado con éxito.
        </p>
    </div>
</body>
</html>
