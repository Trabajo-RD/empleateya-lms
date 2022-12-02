<!-- SCORM COURSES INDEX -->

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        var API = {};

        (function ($) {
            $(document).ready(function () {
                setupScormApi()

                // TODO Write path to index file
                $('#content').attr('src', "/scormdriver/indexAPI.html")
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

				return true;
            }

            function LMSGetValue(varname) {

				//const urlParams = new URLSearchParams(window.location.search);
				//const myParam = decodeURIComponent(urlParams.get('data'));

					displayLog("LMSGetValue: " + varname,'' );
				if(varname === 'cmi.suspend_data'){
					return '{"v":2,"d":[123,34,112,114,111,103,114,101,115,115,34,58,256,108,263,115,111,110,265,267,34,49,266,256,112,266,56,57,44,34,105,278,34,48,287,99,266,49,284,286,275,289,275,291,58,49,125,302,284,277,298,292,294,287,297,256,299,301,304,290,292,125,284,50,315,300,302,317,34,319,306,300,308,296,320,301,303,34,51,330,328,256,310,34,312,322,284,52,335,285,309,330,323,305,311,316,318,347,284,334,326,331,323,53,344,295,337,353,276,363,325,350,321,332,54,360,346,356,348,347,332,55,371,329,373,314,373,332,56,287,361,322,387],"cpv":"pZFZYvZk"}';
				} else if (varname === 'cmi.core.lesson_location'){
					return 'index.html#/lessons/0FlMPI9j4nZPfEkPCHQI4_PMUTtEX3NL';
				}

			}

            function LMSSetValue(varname, varvalue) {
                displayLog("LMSSetValue: " + varname + "=" + varvalue);
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
                displayLog("LMSGetLastError: ");
                return 0;
            }

            function LMSGetDiagnostic(errorCode) {
                displayLog("LMSGetDiagnostic: " + errorCode);
                return "";
            }

            function LMSGetErrorString(errorCode) {
                displayLog("LMSGetErrorString: " + errorCode);
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
</head>
<body style="display: flex; flex-direction: column; align-items: center; justify-content: center;height: 100vh;">
<iframe id="content" name="content" style="border: 1px solid blue; flex: 5; align-self: stretch; height: 100%" frameborder="0"></iframe>
<!-- <div id="logDisplay" style="flex: 1; align-self: stretch; border: 1px solid red; padding: 5px;    overflow-y: scroll; -->
    <!-- overflow-x: hidden;"> -->
<!-- </div> -->
</body>
</html>
