<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
 require 'Admin.php';   
   $p=new Admin(null,"","","","","","","","","","");       
     if(isset($_POST['connect'])){   
        
        
        
         $p->login=$_POST['l'];
         
      $p->motdepasse=$_POST['md'];
       $p->authentification($pdo);
     }
         
         ?> 

 <form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="login">login :</label>
        <input type="text" id="login" name="l" />
    </div>
    <div>
        <label for="motdepasse">mot de passe :</label>
        <input type="text" id="motdepasse" name="md" />
    </div>
     <div class="button">
        <input type="submit" value="connecter" name="connect">
    </div>
     
     
     </form>