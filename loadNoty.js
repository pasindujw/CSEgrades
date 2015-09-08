<script src="resources/jquery-1.8.0.js"></script>
<script type = "text/javascript" src="resources/noty/js/noty/packaged/jquery.noty.packaged.js"></script>

<script>
function showinfo(info) {
   var n = noty({
        timeout: '3000',
        layout: 'topCenter',
        type: 'information',
    text: info,
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});   
    
}
function showError(info) {
   var n = noty({
        timeout: '3000',
        layout: 'topCenter',
        type: 'error',
    text: info,
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});   
    
}    
    
function showSuccess(info) {
   var n = noty({
        timeout: '3000',
        layout: 'topCenter',
        type: 'success',
    text: info,
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});   
    
}        

function showPasswordSugTitle(info) {
   var n = noty({
    
        layout: 'centerRight',
        type: 'success',
    text: info,
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});   
    
}      
function showPasswordSug(info) {
   var n = noty({
        layout: 'centerRight',
        type: 'alert',
    text: info,
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});   
    
}
    
function confirmExit(){
var n = noty({
        text: 'Are you sure you want to exit?',
        type: 'information',
     theme: 'defaultTheme',
    layout: 'center',
        buttons: [
           {
               addClass: 'press btn-primary', text: 'Yes', onClick: function ($noty) {
                   $noty.close();
                  window.location='logout.php';
               }
           },
           {
               addClass: 'press btn-danger', text: 'No', onClick: function ($noty) {
                   $noty.close();
               }
           }
        ]
    })


}
    
</script>

