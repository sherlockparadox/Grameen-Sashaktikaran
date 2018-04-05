<html>
   <head>
      <title>The Materialize Selects Example</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 
      
      <script>
         $(document).ready(function() {
            $('select').material_select();
         });
      </script>
   </head>
   
   <body class = "container">   
      <div class = "row">
         <form class = "col s12">
            <div class = "row">
            <label>Materialize Select</label>
               <select>
                  <option value = "" disabled selected>Select Fruit</option>
                  <option value = "1">Mango</option>
                  <option value = "2">Orange</option>
                  <option value = "3">Apple</option>
               </select>
            </div>             
         </form>       
      </div>
   </body>   
</html>