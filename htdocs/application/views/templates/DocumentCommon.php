<?php
class DocumentCommon extends CI_Controller
{
    public function header()
    {
?>
<html>
    <head>
        <title>help</title>
         <link rel="stylesheet" href="/static/css/main.css">
    </head>
    <body>
        
        <h1 class="heading">
          PDXliver 1.0.0 documentation
        </h1> 
        <div class='contentsTip'>
            <p>
                <p>
                 

<?php   
    }
    public function footer()
    {
?>
        </body>  
</html>
<?php
    }
}