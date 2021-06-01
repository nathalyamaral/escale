<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Swagger UI</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://editor.swagger.io/dist/swagger-editor.css" >
    <link rel="icon" type="image/png" href="http://editor.swagger.io/dist/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="http://editor.swagger.io/dist/favicon-16x16.png" sizes="16x16" />
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Roboto,sans-serif;
            font-size: 9px;
            line-height: 1.42857143;
            color: #444;
            margin: 0px;
        }

        #swagger-editor {
            font-size: 1.3em;
        }

        .container {
            height: 100%;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .Pane1{
            display: none !important;
        }

        .Pane2{
            width: 100% !important;
        }
        /*#editor-wrapper {*/
        /*    height: 100%;*/
        /*    border:1em solid #000;*/
        /*    border:none;*/
        /*}*/
        .swagger-editor-standalone{
            display: none;
        }
        #ace-editor{
            display: none;
        }
        .Pane2 {
            overflow-y: scroll;
        }
    </style>
</head>

<body>
<div id="swagger-editor"></div>

<script src="http://editor.swagger.io/dist/swagger-editor-bundle.js"> </script>
<script src="http://editor.swagger.io/dist/swagger-editor-standalone-preset.js"> </script>
<script>
    window.onload = function() {
        // Build a system
        const editor = SwaggerEditorBundle({
            url: url = window.location.protocol + "//" + window.location.hostname + ":" + window.location.port + "/swagger.json",
            dom_id: '#swagger-editor',
            layout: 'StandaloneLayout',
            presets: [
                SwaggerEditorStandalonePreset
            ]
        })
        window.editor = editor
    }
</script>
</body>
</html>
