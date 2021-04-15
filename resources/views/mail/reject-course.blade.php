<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso rechazado</title>

    <style>
        h1 {
            color: #003876;
        }
        .container, .alert {
            padding: 8rem;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>CAPACITATE.MT.GOB.DO</h1>
            <p>Sistema de Gestión de Aprendizaje del Ministerio de Trabajo</p>
        </header>

        <div>
            <h2>Hemos rechazado este curso</h2>

            <div class="alert alert-danger">
                <p>
                    El curso <a href="http://empleateya-lms.test/cursos/{{$course->slug}}" target="_blank"><strong>{{$course->title}}</strong></a> para el que solicitaste revisión en nuestra plataforma LMS,
                    ha sido rechazado.
                </p>
                <h3>Observaciones:</h3>
                <p>
                    {!! $course->observation->body !!}
                </p>
            </div>
        </div>
    </div>
</body>
</html>
