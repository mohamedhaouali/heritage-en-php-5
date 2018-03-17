<?php

require 'Personne.php';
session_start();
class Admin extends Personne {
    public $login;
    public $motdepasse;
    public $mail;

public function Admin($id, $nom, $prenom, $age, $sex, $ville, $competences, $photo,$login,$motdepasse,$mail){
    parent::Personne($id, $nom, $prenom, $age, $sex, $ville, $competences, $photo);
            
            $this->login=$login;
            $this->motdepasse=$motdepasse;
            $this->mail=$mail;
  
}

    
 public function afficheAdmin(){
     parent::affiche();
         
         echo $this->login.' '.$this->motdepasse.' '.$this->mail;
 }

 public function  insert($conn)  {
         parent::ajoutPersonne($conn);
         $id=$conn->lastInsertId();
          $st=$conn->prepare("insert into admin values (?,?,?,?)");
     $r=$st->execute(array($id,$this->login,$this->motdepasse,$this->mail));
    
 }
     
 function affiche() {
        parent ::affiche();
        echo
        " login : " . $this->login;
        " motdepasse: " . $this->motdepasse;
        " email : " . $this->mail;
    }
 public function authentification($conn){
     $st =$conn->prepare("select * from admin where login = ? and motdepasse = ?");
     $st->execute(array($this->login,$this->motdepasse));
     $row=$st->fetch();
       if($st->rowCount()==1){
           $_SESSION['id_s']=$row['id'];
               header("location:profile.php");
                   
       }
 }
   public function affectadmin($conn,$id){
     parent::affectPersonne($conn, $id);
      $st=$conn->prepare("select * from admin where id=?");
     $st->execute(array($id));
     $row=$st->fetch();
      $this->login=$row['login'];
            $this->motdepasse=$row['motdepasse']  ;   
            $this->mail=$row['mail'];
   
 }
     public function modifieradmin($conn,$id){
     parent:: modifierPersonne($conn,$id)  ; 
     
          $st=$conn->prepare("update admin set login=?,motdepasse=?,mail=? where id=?");
         $r= $st->execute(array($this->login,$this->motdepasse,$this->mail,$id));
         header("location:profile.php");
       
     } 
    
    
    
    
    
     }

