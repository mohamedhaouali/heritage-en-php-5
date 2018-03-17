
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
<?php
   require 'Admin.php';   
   $p=new Admin(null,"","","","","","","","","","");

   if(isset($_POST['bt'])){
           $p->nom=$_POST['n'];
         
      $p->prenom=$_POST['p'];
           
           
       $p->age=$_POST['a'];
           
         $p->sex=$_POST['s'];
          $p->ville=$_POST['ville'];
               
           
               
        
          $comp='';
         foreach ($_POST['cours'] as $v )
           {
           $comp=$comp.' '.$v;
           
           } 
   
   
           
         $p->competences=$comp;
            
       $p->login=$_POST['l'];
         
      $p->motdepasse=$_POST['md'];
           
        $p->mail=$_POST['m'];
          
          
           
       $p->photo=$_FILES['ph']['name'];
       move_uploaded_file($_FILES['ph']['tmp_name'],"images/".$p->photo);
                $p->afficheAdmin();
              $p->insert($pdo);  
      
     
   }
     ?>   
     
        

        <form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="n" />
    </div>
    <div>
        <label for="prenom">prenom :</label>
        <input type="text" id="prenom" name="p" />
    </div>

 <div>
        <label for="age">age :</label>
        <input type="text" id="age" name="a" />
    </div>


  <label>h<input type="radio"  value="homme" name="s"></label> </br>
  <label>f<input type="radio"  value="femme" name="s"> </label>

  <br>



<label><input type="checkbox" id="symfony" value="symfony" name="cours[]"> symfony</label><br>

<input type="checkbox" id="php5" value="php5" name="cours[]"> <label for="cbox2">php5</label>


<label><input type="checkbox" id="cbox1" value="html5" name="cours[]"> html5</label><br>

<input type="checkbox" id="cbox2" value="css3" name="cours[]"> <label for="css3">CSS3</label>


ville <select name ="ville">
    <option value="tunis"> tunis</option>
<option value="gafsa"> gafsa</option>
<option value="nabel"> nabel</option>
</select>
<br>
photo  <input type="file"  name="ph"><br>
 <div>
        <label for="login">login :</label>
        <input type="text" id="login" name="l" />
    </div>
    <div>
        <label for="motdepasse">mot de passe :</label>
        <input type="text" id="motdepasse" name="md" />
    </div>

 <div>
        <label for="mail">mail :</label>
        <input type="text" id="mail" name="m" />
    </div>
    <div class="button">
        <input type="submit" value="Enregistrer" name="bt">
    </div>
</form>