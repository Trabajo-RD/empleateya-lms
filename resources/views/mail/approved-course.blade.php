<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso aprobado</title>

    <style>
        .container {
            background-color: #eef0f0;
            padding: 2rem 24rem;
        }
        .card {
            color: #333333;
            background-color: #ffffff;
            padding: 2rem;
        }
        .card-header {
            margin-bottom: 2rem;
        }
        .title {
            color: #003876;
        }

    </style>

</head>
<body>
    <div class="container">
        <div class="card">

            <div class="card-header">
                <header>
                    <a href="http://capacitate.mt.gob.do/es" target="_blank">
                        <h1 class="title">CAPACITATE.MT.GOB.DO</h1>
                    </a>
                </header>
            </div>

            <div class="card-body">
                <h2>Hemos aprobado tu curso</h2>
                <p>
                    El curso <strong>{{$course->title}}</strong></a> para el que solicitaste revisión en nuestra plataforma LMS,
                    ha sido aprobado con éxito.
                </p>
            </div>

            <div class="card-footer">

            </div>

        </div>
    </div>
</body>
</html>
