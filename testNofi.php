<html>
<head>
    <title>Add New Student</title>

    <script src="resources/jquery-1.8.0.js"></script>
    </head>
    
   
    
<body>
    
    <script type = "text/javascript" src="resources/noty/js/noty/packaged/jquery.noty.packaged.js"></script>
    
    
    
    <script>
    var n = noty({
        timeout: '1',
        layout: 'center',
        type: 'success',
    text: 'New Student added!',
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});
        </script>
    </body>
</html>