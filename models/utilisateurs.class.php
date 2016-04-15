<?php

class utilisateur
{

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

$utilisateur = new utilisateur();