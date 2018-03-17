<html>
    
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

 <?php


 require 'Admin.php';   
   $p=new Admin(null,"","","","","","","","","","");       
     $id=$_SESSION['id_s'];
     $p->affectadmin($pdo, $id);
     $p->affiche();
             
     ?>   







</body>
</html>
