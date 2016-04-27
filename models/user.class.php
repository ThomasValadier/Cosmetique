<?php

require_once 'db.classe.php';

class User
{
    private $pseudo;
    private $password;
    private $repeatPassword;
    private $email;
    private $nom;
    private $prenom;
    private $sexe;
    private $adresse;
    private $ville;
    private $codePostal;
    private $telephone;

    function __construct($pseudo, $password, $repeatPassword, $email, $nom, $prenom, $sexe, $adresse, $ville, $codePostal, $telephone)
    {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->codePostal = $codePostal;
        $this->telephone = $telephone;
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
        $sql = "INSERT INTO users (identifiant_user, email_user, password_user, nom_user, prenom_user, sexe_user, adresse_user, ville_user, codePostal_user, telephone_user) VALUES(:pseudo, :email, :password, :nom, :prenom, :sexe, :adresse, :ville, :codePostal, :telephone)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            'pseudo'=>$this->pseudo,
            'email'=>$this->email,
            'password'=>$this->password,
            'nom'=>$this->nom,
            'prenom'=>$this->prenom,
            'sexe'=>$this->sexe,
            'adresse'=>$this->adresse,
            'ville'=>$this->ville,
            'codePostal'=>$this->codePostal,
            'telephone'=>$this->telephone
            //'resultatTest'=>$this->resultatTest
        ));
        //- ON RETOURNE 1 SI TOUT CE PASSE BIEN
        return 1;
    }

    public function compte($req)
    {
        if (count($req) == 0)
            echo 'aucun résulat ne corresponds';
        elseif (count($req) == 1)
            echo '1 résulat corresponds à votre recherche';
        elseif (count($req) >= 1)
            echo count($req) . ' résulats correspondent à votre recherche';
    }

}
