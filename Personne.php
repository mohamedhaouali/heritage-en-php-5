<?php

require 'pageconnexionenphp.php';
class Personne {
    public $id;
     public $nom;
    public $prenom;
    public $age;
    public $sex ;   
    public $ville;
    public $competences;
     public $photo;
    
    
     public function Personne($id,$nom,$prenom,$age,$sex,$ville,$competences,$photo){
         
         
            $this->id=$id;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->age=$age;
            $this->sex=$sex;
            $this->ville=$ville;
            $this->competences=$competences;
            $this->photo=$photo;
         
     }
    
     public function affiche(){
         
         echo $this->nom.' '.$this->prenom .$this->age.$this->sex.$this->ville.$this->competences.$this->photo;
     }
     
     public function ajoutPersonne($conn) {

     $st=$conn->prepare("insert into user values (default,?,?,?,?,?,?,?)");
     $r=$st->execute(array($this->nom,$this->prenom,$this->age,$this->sex,$this->ville,$this->competences,$this->photo));
     }
    public function affichetableaux($conn){
     $st=$conn->prepare("select * from user");
     $st->execute();
     return $st;
    }
     public function affectPersonne($conn,$id){
      $st=$conn->prepare("select * from user where id=?");
     $st->execute(array($id));
     $row=$st->fetch();
      $this->nom=$row['nom'];
            $this->prenom=$row['prenom']  ;   
            $this->age=$row['age'];
            $this->sex=$row['sexe'];
            $this->ville=$row['ville'];
            $this->competences=$row['competence'];
            $this->photo=$row['photo'];
     }
     
     public function modifierPersonne($conn,$id){
          $st=$conn->prepare("update user set nom=?,prenom=?,age=?,sexe=?,ville=?,competence=?,photo=? where id=?");
         $r= $st->execute(array($this->nom,$this->prenom,$this->age,$this->sex,$this->ville,$this->competences,$this->photo,$id));
          header("location:index.php");
       
     }
     
    public function supprimer($conn,$id)
{
    $st = $conn->prepare("delete from user where id=? " );
    $st->execute(array($id));
   header("location:index.php");
   
 }
  public function rechercheparnom($conn,$nom){
      $st=$conn->prepare("select * from user where nom like ?");
       $st->execute(array("%".$nom."%"));
     return $st;
     
     
   
  }   
}

      
?>