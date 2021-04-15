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
        .container, .alert {
            padding: 8rem;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>CAPACITATE.MT.GOB.DO</h1>
            <p>Sistema de Gestión de Aprendizaje del Ministerio de Trabajo</p>
        </header>

        <div class="alert alert-success">
            <h2>Hemos aprobado tu curso</h2>

            <div class="alert alert-success">
                <p>
                    El curso <a href="http://empleateya-lms.test/cursos/{{$course->slug}}" target="_blank"><strong>{{$course->title}}</strong></a> para el que solicitaste revisión en nuestra plataforma LMS,
                    ha sido aprobado con éxito.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
