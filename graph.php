<?php
//include('dbConnector.php');
include('session.php');
?>
<!DOCTYPE html>
<html>
    <script src="resources/jquery-1.6.1.min.js"></script>
    <head>
        <title>Interactive Line Graph</title>
        <script>
            var graph;
            var xPadding = 30;
            var yPadding = 30;
            
            var data = { values:[
                <?php 

                $semGpa=getSemGpa(1,$login_session);
                if($semGpa!=0)
                echo '{ X: "Sem1", Y:'.$semGpa.' },';

                $semGpa=getSemGpa(2,$login_session);
                if($semGpa!=0)
                echo '{ X: "Sem2", Y:'.$semGpa.' },';

                $semGpa=getSemGpa(3,$login_session);
                if($semGpa!=0)
                echo '{ X: "Sem3", Y:'.$semGpa.' },';

               $semGpa=getSemGpa(4,$login_session);
                if($semGpa!=0)
                echo '{ X: "Sem4", Y:'.$semGpa.' },';

                $semGpa=getSemGpa(5,$login_session);
                if($semGpa!=0)
                echo '{ X: "Sem5", Y:'.$semGpa.' },';

               $semGpa=getSemGpa(6,$login_session);
                if($semGpa!=0)
                echo '{ X: "Sem6", Y:'.$semGpa.' },';

                $semGpa=getSemGpa(7,$login_session);
                if($semGpa!=0)
                echo '{ X: "Sem7", Y:'.$semGpa.' },';

               $semGpa=getSemGpa(8,$login_session);
                if($semGpa!=0)
                echo '{ X: "Sem8", Y:'.$semGpa.' },';
                ?>
            ]};

            // Returns the max Y value in our data list
            function getMaxY() {
                var max = 0;
                
                for(var i = 0; i < data.values.length; i ++) {
                    if(data.values[i].Y > max) {
                        max = data.values[i].Y;
                    }
                }
                
                max += 10 - max % 10;
                return 5;
            }
            
            // Return the x pixel for a graph point
            function getXPixel(val) {
                return ((graph.width() - xPadding) / data.values.length) * val + (xPadding * 1.5);
            }
            
            // Return the y pixel for a graph point
            function getYPixel(val) {
                return graph.height() - (((graph.height() - yPadding) / getMaxY()) * val) - yPadding;
            }

            $(document).ready(function() {
                graph = $('#graph');
                var c = graph[0].getContext('2d');            
                
                c.lineWidth = 2;
                c.strokeStyle = '#333';
                c.font = 'italic 8pt sans-serif';
                c.textAlign = "center";
                
                // Draw the axises
                c.beginPath();
                c.moveTo(xPadding, 0);
                c.lineTo(xPadding, graph.height() - yPadding);
                c.lineTo(graph.width(), graph.height() - yPadding);
                c.stroke();
                
                // Draw the X value texts
                for(var i = 0; i < data.values.length; i ++) {
                    c.fillText(data.values[i].X, getXPixel(i), graph.height() - yPadding + 20);
                }
                
                // Draw the Y value texts
                c.textAlign = "right"
                c.textBaseline = "middle";
                
                for(var i = 0; i < getMaxY(); i += 0.5) {
                    c.fillText(i, xPadding - 10, getYPixel(i));
                }
                
                c.strokeStyle = '#f00';
                
                // Draw the line graph
                c.beginPath();
                c.moveTo(getXPixel(0), getYPixel(data.values[0].Y));
                for(var i = 1; i < data.values.length; i ++) {
                    c.lineTo(getXPixel(i), getYPixel(data.values[i].Y));
                }
                c.stroke();
                
                // Draw the dots
                c.fillStyle = '#333';
                
                for(var i = 0; i < data.values.length; i ++) {  
                    c.beginPath();
                    c.arc(getXPixel(i), getYPixel(data.values[i].Y), 4, 0, Math.PI * 2, true);
                    c.fill();
                }
            });
        </script>
    </head>
<body>
        <div class="gra">
        <canvas id="graph" width="300" height="150">   
        </canvas> 
        </div>
</body>
</html>