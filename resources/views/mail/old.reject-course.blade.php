<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso rechazado</title>
</head>
<body>

    <center style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#eef0f0;padding:25px 0;">
        <!--[if (gte mso 9)|(IE)]>
          <table width="600" align="center" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0;">
            <tr>
              <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;border-collapse:collapse;">
              <![endif]-->
              <table align="center" width="420" style="background-color:#ffffff;">

                <tr style="width:100%;">

                        <tr>
                            <td align="center" style="padding:25px 20px 10px 20px;color:#1F2937;">
                                <a style="color:#003876;text-decoration:none;" href="http://capacitate.mt.gob.do/es" target="_blank">
                                    <h1 class="title">CAPACITATE.MT.GOB.DO</h1>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding:0 20px;color:#374151;">
                                <h2>Hemos rechazado este curso</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:8px 20px;color:#4B5563;">
                                El curso <strong>{{$course}}</strong></a> para el que solicitaste revisión en nuestra plataforma LMS,
                                ha sido rechazado.
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:8px 20px 0;color:#374151;">
                                <h3>Observaciones:</h3>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:4px 20px;color:#4B5563;">
                                {!! $observation !!}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:8px 20px 20px;color:#4B5563;">
                                Si tienes problemas con la plataforma puedes escribirnos a
                                <a style="color:#2563EB;" href="mailto:capacitate@mt.gob.do" target="_blank">capacitate@mt.gob.do</a>
                                y con gusto te ayudaremos lo más pronto posible.
                            </td>
                        </tr>


                </tr>
              </table>
              <!--[if (gte mso 9)|(IE)]>
              </td>
            </tr>
          </table>
        <![endif]-->
    </center>


</body>
</html>
