<！DOCTYPE html> 
<head> 
    < 
        meta charset = "utf-8"> 
        <meta-url-compatible> content = "IE = edge"> 
        <meta name = "viewport" content = "width = device-width、initial-scale = 1"> 

        <title> Microposts </ 

        - > <！ -  Bootstrap  - > 
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com /bootstrap/3.3.7/css/bootstrap.min.css "> 
        <script src =" https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "> </スクリプト> 
        <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </ script> 
    </ head> 
    <body> 
        @include（ 'commons.navbar'）

        <div class = "container">
            @include（ 'commons.error_messages'）

            @yield（ 'content'）
        </ div> 
    </ body> 
</ html>