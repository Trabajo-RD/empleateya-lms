<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $params->title ?></title>

</head>

<body style="display: flex; flex-direction: column; align-items: center; justify-content: center;height: 100vh;">

<?php

        $data = $_GET['data'];

        if (isset($data)) {
            $data = base64_decode($data);
            // var_dump($data);
        }
        else {
            $data = '{}';
        }


        $params = json_decode(utf8_encode($data));

   ?>

    <iframe id="content" name="content" style="border: 1px solid blue; flex: 5; align-self: stretch; height: 100%" frameborder="0"></iframe>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <script>
            var API = {};


            (function($) {
                let initParams = <?php echo $data ?>;

                let saving = false;

                let state = {
                    id: '<?php echo $params->cpv ?>'
                };

                $(document).ready(function() {

                    //cmi.core.lesson_mode
                    //cmi.core.lesson_status
                    //cmi.core.exit=suspend
                    //cmi.suspend_data
                    //cmi.launch_data
                    //cmi.core.lesson_location

                    //Init waiting indicator.
                    fetch('/state.php?id=<?php echo $params->cpv ?>')
                        .then(r => r.json())
                        .then((resp) => {
                            if (resp && typeof resp.id === 'string')
                                state = resp;

                            setupScormApi()

                            $('#content').attr('src', "/storage/scorm/<?php echo $params->root . '/' . $params->index; ?>");

                            //Dismiss waiting indicator.
                        });

                });

                function setupScormApi() {
                    API.LMSInitialize = LMSInitialize;
                    API.LMSGetValue = LMSGetValue;
                    API.LMSSetValue = LMSSetValue;
                    API.LMSCommit = LMSCommit;
                    API.LMSFinish = LMSFinish;
                    API.LMSGetLastError = LMSGetLastError;
                    API.LMSGetDiagnostic = LMSGetDiagnostic;
                    API.LMSGetErrorString = LMSGetErrorString;
                }

                function LMSInitialize(initializeInput) {
                    displayLog("LMSInitialize: " + initializeInput);
                    return true;
                }

                function LMSGetValue(varname) {

                    const value = state[varname] || '';

                    // displayLog("LMSGetValue: " + varname + '=' + '');

                    return value;

                }

                function LMSSetValue(varname, varvalue) {

                    state[varname] = varvalue;

                    displayLog("LMSSetValue: " + varname + '=' + varvalue);

                    if (varname === 'cmi.suspend_data') {
                        if (!saving) {
                            saving = true;
                            fetch('/state.php', {
                                    method: 'POST',
                                    'Content-Type': 'application/json',
                                    body: JSON.stringify({update: true ,...state})
                                })
                                .then((res) => res.json())
                                .then(() => saving = false, () => saving = false)

                        }
                    }

                    return "";
                }

                function LMSCommit(commitInput) {
                    displayLog("LMSCommit: " + commitInput);
                    return true;
                }

                function LMSFinish(finishInput) {
                    displayLog("LMSFinish: " + finishInput);
                    return true;
                }

                function LMSGetLastError() {
                    // displayLog("LMSGetLastError: ");
                    return 0;
                }

                function LMSGetDiagnostic(errorCode) {
                    // displayLog("LMSGetDiagnostic: " + errorCode);
                    return "";
                }

                function LMSGetErrorString(errorCode) {
                    // displayLog("LMSGetErrorString: " + errorCode);
                    return "";
                }

                function displayLog(textToDisplay) {
                    /*
                    var loggerWindow = document.getElementById("logDisplay");
                    var item = document.createElement("div");
                    item.innerText = textToDisplay;
                    loggerWindow.appendChild(item);
                    var height = $('#logDisplay')[0].scrollHeight;
                    $('#logDisplay').scrollTop(height);
                    */

                    console.log(arguments[0], arguments[1]);
                }
            })(jQuery);
        </script>

</body>

</html>
