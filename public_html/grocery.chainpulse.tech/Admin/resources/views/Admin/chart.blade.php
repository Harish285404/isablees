<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>jQuery UI ProgressBar functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <style>
         .ui-widget-header {
            background: #cedc98;
            border: 1px solid #DDDDDD;
            color: #333333;
            font-weight: bold;
         }
      </style>
      
      <script>
         $(function() {
            $( "#progressbar-1" ).progressbar({
               value: <?php echo $data;?>
            });
         });
      </script>
   </head>
   
   <body> 
      <div class="abc" id = "progressbar-1" style="width:100px;"></div> 
   </body>
</html>