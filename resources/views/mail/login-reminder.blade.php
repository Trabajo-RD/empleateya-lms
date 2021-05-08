<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recordatorio</title>

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
        p {
            margin-bottom: 15px;
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
                <h2>{{ $details['title'] }}</h2>
                <p>
                    {{ $details['body'] }}
                </p>
                <p>
                    Nuestra meta es que puedas lograr, de manera exitosa, los objetivos
                    que te has propuesto, y para ello debemos recordarte que la constancia
                    es la clave del éxito.
                </p>
                <p>
                    Si tienes problemas con la plataforma puedes escribirnos a
                    <a href="mailto:capacitate@mt.gob.do" target="_blank">capacitate@mt.gob.do</a>
                    y con gusto te ayudaremos lo más pronto posible.
                </p>
            </div>

            <div class="card-footer">

            </div>

        </div>
    </div>
</body>
</html>
