<?php

require_once 'db.classe.php';

class User
{
    private $pseudo;
    private $password;
    private $repeatPassword;
    private $email;
    // private $DB;

    function __construct($pseudo, $password, $repeatPassword, $email)
    {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
        $this->email = $email;
        $db = new DB();
        $this->db = $db->getBdd();
    }

    //- ################################################################
        //- INSCRIPTION
        ################################################################ -//

    //- VERIFICATION PSEUDO LORS DE L'INSCRIPTION
    function verif_user()
    { //- ON LANCE LA REQUETE QUI VERIFIE SI LE PSEUDO EXISTE BASE DE DONNEES [EXISTE = TRUE / EXISTE PAS = FALSE]
        $sql = 'SELECT id_user FROM users WHERE identifiant_user = :pseudo';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':pseudo', $this->pseudo);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        //- SI LE PSEUDO EXISTE CA RETOURNE FALSE
        if ($user == false)
        {
            if(strlen($this->password) > 8)
            { //- ON TEST SI LE PASSWORD CORRESPOND AVEC LA CONFIRMATION PASSWORD
                if($this->password == $this->repeatPassword)
                {
                    //- LE PASSWORD CORRESPOND DONC ON LE CRYPT
                    //$this->password = password_hash($this->password, PASSWORD_BCRYPT);
                    return true;
                }
                else
                { //- LES PASSWORD SONT DIFFERENTS
                    echo 'PASSWORD NON IDENTIQUE';
                    return false;
                }
            }
            else
            { //- LE PASSWORD RENTRE PAS DANS LES CONDITIONS
                echo 'PASSWORD MINIMUM 8 CARACTERES';
                return false;
            }
        }
        else
        { //- LE PSEUDO EST DEJA PRIS
          echo 'ERREUR - UTILISATEUR EXISTE DEJA';
          return false;
        }
    }

    public function insert_user()
    { //- ON INSERE L'UTILISATEUR EN BASE DE DONNEES
        $sql = "INSERT INTO users (identifiant_user, email_user, password_user) VALUES(:pseudo, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            'pseudo'=>$this->pseudo,
            'email'=>$this->email,
            'password'=>$this->password
        ));
        //- ON RETOURNE 1 SI TOUT CE PASSE BIEN
        return 1;
    }

    //- ################################################################
        //- CONNEXION
        ################################################################ -//

    // public function verif_connexion()
    // { //- ON LANCE LA REQUETE QUI VERIFIE SI LE PSEUDO EXISTE EST ATTRIBUE A UN UTILISATEUR [EXISTE = TRUE / EXISTE PAS = FALSE]
    //     $sql = "SELECT id_user FROM users WHERE identifiant_user = '$identifiant_user'";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute();
    //     $user_connexion = $stmt->fetch(PDO::FETCH_OBJ);
    //
    //     if ($user_connexion == true)
    //     {
    //         if (password_verify($password_user, $this->password))
    //         {
    //             return true;
    //         }
    //         else
    //         {
    //             return false;
    //         }
    //     }
    //     else
    //     { //- LE PSEUDO EST DEJA PRIS
    //       echo 'ERREUR - UTILISATEUR EXISTE PAS';
    //       return false;
    //     }
    // }


//     public function session()
//     {
//         $sql = "SELECT id_user FROM users WHERE identifiant_user = :pseudo";
//         $requete = $this->db->getBdd()->prepare($sql);
//         $requete->execute(array('pseudo'=>$this->pseudo));
//         $requete = $requete->fetch();
//         $_SESSION['id_session'] = $requete['id_user'];
//         $_SESSION['user_current'] = $this->pseudo;
//         return 1;
//     }
//
}
