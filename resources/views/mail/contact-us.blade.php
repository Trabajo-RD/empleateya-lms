<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Mensaje de contacto</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="x-apple-disable-message-reformatting" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<style type="text/css">
		/* Google font import Lato */
		@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');

		/* Outlook link fix */
		#outlook a {
			padding: 0;
		}

		/* Hotmail background & line height fixes */
		.ExternalClass {
			width: 100% !important;
		}

		.ExternalClass,
		.ExternalClass p,
		.ExternalClass span,
		.ExternalClass font,

		/* Image borders & formatting */
		img {
			outline: none;
			text-decoration: none;
			-ms-interpolation-mode: bicubic;
		}

		a img {
			border: none;
		}

		/* Re-style iPhone automatic links (eg. phone numbers) */
		.appleLinksGrey a {
			color: #919191 !important;
			text-decoration: none !important;
		}

		/* Hotmail symbol fix for mobile devices */
		.ExternalClass img[class^=Emoji] {
			width: 10px !important;
			height: 10px !important;
			display: inline !important;
		}

		/* Button hover colour change */
		.CTA:hover {
			background-color: #EE2A24 !important;
		}


		@media screen and (max-width:640px) {
			.mobilefullwidth {
				width: 100% !important;
				height: auto !important;
			}

			.logo {
				padding-left: 30px !important;
				padding-right: 30px !important;
			}

			.h1 {
				font-size: 36px !important;
				line-height: 48px !important;
				padding-right: 30px !important;
				padding-left: 30px !important;
				padding-top: 30px !important;
			}

			.h2 {
				font-size: 18px !important;
				line-height: 27px !important;
				padding-right: 30px !important;
				padding-left: 30px !important;
			}

			.p {
				font-size: 16px !important;
				line-height: 28px !important;
				padding-left: 30px !important;
				padding-right: 30px !important;
				padding-bottom: 30px !important;
			}

			.CTA_wrap {
				padding-left: 30px !important;
				padding-right: 30px !important;
				padding-bottom: 30px !important;
			}

			.footer {
				padding-left: 30px !important;
				padding-right: 30px !important;
			}

			.number_wrap {
				padding-left: 30px !important;
				padding-right: 30px !important;
			}

			.unsubscribe {
				padding-left: 30px !important;
				padding-right: 30px !important;
			}

		}

	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>


<body style="padding:0; margin:0; -webkit-text-size-adjust:none; -ms-text-size-adjust:100%; background-color:#e8e8e8; font-family: helvetica, 'Lato', sans-serif; font-size:16px; line-height:24px; color:#1F2937">

<!--[if mso]>
	<style type="text/css">
		body, table, td {font-family: Arial, Helvetica, sans-serif !important;}
	</style>
<![endif]-->



<!-- // FULL EMAIL -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 30px; padding-bottom: 30px;">

	<tr>

		<!-- // LEFT SPACER CELL *** MUST HAVE A BACKGROUND COLOUR -->
		<td bgcolor="#EBEBEB" style="font-size:0px;">&zwnj;</td>
		<!-- LEFT SPACER CELL // -->

			<!-- // MAIN CONTENT CELL -->
			<td align="center" width="600" bgcolor="#FFFFFF">

				<table width="100%" border="0" cellspacing="0" cellpadding="0">

					<tbody>

						<!-- // START OF CONTENT -->

						<!-- LOGO -->
						<tr>
                            <td class="logo" align="left" bgcolor="#003876" style="padding-top: 20px; padding-right:50px; padding-bottom:20px; padding-left:50px;">
                                <img src="https://uploads-ssl.webflow.com/609b815e1412b46744e9555a/609b831f6c040a3c5ca7475d_logo-v2-white.png" width="304" height="auto" alt="MT logo">
                            </td>
                        </tr>

                        <!-- H1 -->
                        <tr>
                            <td class="h1" align="left" bgcolor="#FFFFFF" style="padding-top: 50px; padding-right: 50px; padding-bottom: 0px; padding-left: 50px; font-size: 22px; line-height:43px; color: #4461A5;" >
                                <h1>Capacítate RD</h1>
                            </td>
                        </tr>

                        <!-- H2 -->
                        <tr>
                            <td class="h2" align="left" bgcolor="#FFFFFF" style="padding-top: 0px; padding-right: 50px; padding-bottom: 30px; padding-left: 50px; font-size: 16px; line-height:27px; font-weight: 400; color: #003876;">
                                <h2>Mensaje de contacto.</h2>
                            </td>
                        </tr>

                        <!-- CONTENT -->
                        <tr>
                            <td align="left" bgcolor="#FFFFFF" style="padding-top: 0px; padding-right: 50px; padding-bottom: 0px; padding-left: 50px; font-size: 16px; line-height:24px; font-weight: 400; color: #919191;">
                            

                                <p>
                                    <strong>De:</strong> {{$details['name']}} <br>
                                    <strong>Email:</strong> {{$details['email']}}
                                </p>
                                {{-- <p>Enviado el: viernes, 18 de junio de 2021 2:35 p. m.</p> --}}
                                
                                <p>
                                    Sres. Capacítate,
                                </p>                                
                            </td>
                        </tr>

                        <!-- FEATURED CONTENT -->
                        <tr>
                            <td align="left" bgcolor="#FFFFFF" style="padding-top: 0px; padding-right: 50px; padding-bottom: 10px; padding-left: 50px; font-size: 16px; line-height:24px; font-weight: 400; color: #919191;">
                                <p>
                                    {{ $details['msg'] }}
                                </p>
                            </td>
                        </tr>

                        <!-- CTA -->
                        {{-- <tr>
                            <td class="CTA_wrap" align="left" bgcolor="#FFFFFF" style="padding-top: 0px; padding-right: 50px; padding-bottom: 30px; padding-left: 50px;">
                                <table border="0" cellspacing="0" cellpadding="0" align="left">
                                    <!-- // BUTTON -->
                                        <tr>
                                            <td class="CTA" align="left" style="border-radius: 0px; padding-top: 15px; padding-right: 20px; padding-bottom: 15px; padding-left: 20px;"
                                            bgcolor="#003876">
                                                <a href="http://capacitate.mt.gob.do/es" target="_blank" style="color: #FFFFFF; font-size: 18px; font-weight: 700; text-align: center; text-decoration: none; border-radius: 0px; display: inline-block">
                                                    Ingrese al sistema
                                                </a>
                                            </td>
                                        </tr>
                                    <!-- BUTTON // -->
                                </table>
                            </td>
                        </tr> --}}

                        <!-- GREETINGS -->
                        <tr>
                            <td align="left" bgcolor="#FFFFFF" style="padding-top: 0px; padding-right: 50px; padding-bottom: 50px; padding-left: 50px; font-size: 16px; line-height:24px; font-weight: 400; color: #919191;">
                                <p>
                                    Agradeciendo su atención a la presente, me despido.
                                </p>
                            </td>
                        </tr>

                        <!-- SIGNATURE -->
                        <tr>
                            <td align="left" bgcolor="#FFFFFF" style="padding-top: 0px; padding-right: 50px; padding-bottom: 50px; padding-left: 50px; font-size: 16px; line-height:24px; font-weight: 400; color: #919191;">
                                <p>
                                    Atentamente,
                                </p>
                                <p>
                                    {{ $details['name'] }}
                                    <br>
                                    @if($details['phone'] != '')
                                        <strong>Tel.:</strong> <span>{{ $details['phone'] }}</span>
                                    @endif
                                </p>
                            </td>
                        </tr>

                        <!-- // FOOTER-->
                        <tr>

                                <!-- // MAIN CONTENT CELL -->
                                <td class="unsubscribe" align="center" width="600" bgcolor="#EBEBEB" style="padding-top: 25px; padding-right: 50px; padding-bottom: 0px; padding-left: 50px; font-size:0px;">

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                        <tbody>
                                            <!-- START FOOTER CONTENT // -->
                                                <tr>
                                                    <td align="center" style="padding-top: 0px; padding-right: 0px; padding-bottom: 20px; padding-left: 0px; font-size: 12px; line-height:18px; font-weight: 400; color: #919191;">
                                                        Ave. Enrique Jiménez Moya 5, esq. Republica del Libano, Centro de los Héroes,
                                                        <br/>Distrito Nacional, Republica Dominicana
                                                    </td>
                                                <tr>

                                                <!-- LINKS -->
                                                <tr>
                                                    <td align="center" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 12px; line-height:18px; font-weight: 400; color: #919191;">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Tel.:
                                                                        <a href="tel:+18095354404" target="_blank">
                                                                        (809) 535-4404
                                                                        </a>
                                                                    </td>

                                                                    <td style="padding-right:15px; padding-left:15px;">|</td>

                                                                    <td>
                                                                        <a href="mailto:#" target="_blank">
                                                                            JOHN.DOE@MT.GOB.DO
                                                                        </a>
                                                                    </td>

                                                                    <td style="padding-right:15px; padding-left:15px;">|</td>

                                                                    <td>
                                                                        <a href="https://www.mt.gob.do/" target="_blank">
                                                                            MT.GOB.DO
                                                                        </a>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <!-- SOCIAL MEDIA -->
                                                <tr>
                                                    <td align="center">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a href="https://www.instagram.com/mtrabajord/" target="_blank">
                                                                            <img src="https://uploads-ssl.webflow.com/609b815e1412b46744e9555a/609b98ae688c76854a31fd7c_%EF%85%AD%402x.png"
                                                                            width="auto" height="24" border="0" style="padding-top: 25px; padding-right: 15px; padding-bottom: 25px, padding-left: 0px; display: inline-block;"
                                                                            class="social_icon" alt="instagram logo">
                                                                        </a>
                                                                    </td>

                                                                    <td>
                                                                        <a href="https://www.facebook.com/MTrabajoRD" target="_blank">
                                                                            <img src="https://uploads-ssl.webflow.com/609b815e1412b46744e9555a/609b98ae09cce7ca67aecd0c_%EF%82%82%402x.png"
                                                                            width="auto" height="24" border="0" style="padding-top: 25px; padding-right: 15px; padding-bottom: 25px, padding-left: 0px; display: inline-block;"
                                                                            class="social_icon" alt="facebook logo">
                                                                        </a>
                                                                    </td>

                                                                    <td>
                                                                        <a href="https://twitter.com/MTrabajoRD" target="_blank">
                                                                            <img src="https://uploads-ssl.webflow.com/609b815e1412b46744e9555a/609b98ae322c5cfab09a392e_%EF%82%99%402x.png"
                                                                            width="auto" height="24" border="0" style="padding-top: 25px; padding-right: 15px; padding-bottom: 25px, padding-left: 0px; display: inline-block;"
                                                                            class="social_icon" alt="twitter logo">
                                                                        </a>
                                                                    </td>

                                                                    <td>
                                                                        <a href="https://www.youtube.com/c/MinisteriodeTrabajoRD" target="_blank">
                                                                            <img src="https://uploads-ssl.webflow.com/609b815e1412b46744e9555a/609b98aed0751ef9f4baad4a_%EF%85%A7%402x.png"
                                                                            width="auto" height="24" border="0" style="padding-top: 25px; padding-right: 15px; padding-bottom: 25px, padding-left: 0px; display: inline-block;"
                                                                            class="social_icon" alt="youtube logo">
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                            <!-- END FOOTER CONTENT // -->
                                        </tbody>

                                    </table>

                                </td>
                            <!-- // MAIN CONTENT CELL -->



                        </tr>

						<!-- END OF CONTENT // -->

					</tbody>
				</table>

			</td>
		<!-- // MAIN CONTENT CELL -->

		<!-- // RIGHT SPACER CELL *** MUST HAVE A BACKGROUND COLOUR -->
		<td bgcolor="#EBEBEB" style="font-size:0px">&zwnj;</td>
		<!-- RIGHT SPACER CELL // -->

	</tr>



</table>
<!-- FULL EMAIL // -->
</body>
</html>
