<?php

/* ----------------- */
/* CLASSE SUPERHEROS */
/* ----------------- */


class SuperHeros
{
    protected $nom;
    
    /**
     * SuperHeros constructor.
     */
    public function __construct($data)
    {
        ???????????????;
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            ???????????????;

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function update($data)
    {
        ???????????????;
    }

    
}



/* ------------------------ */
/* CLASSE SUPERHEROSMANAGER */
/* ------------------------ */



class SuperHerosManager
{
    protected $db;

    public function __construct($db)
    {
        ???????????????;
    }

    public function addSuperHeros(SuperHeros $sh)
    {
        $requete = 'INSERT INTO superheros (nom, pouvoir, ville, univers, nomreel) VALUES (" ???;
		$this->db->query($requete);
		$sh->setId($this->db->lastInsertId());
    }

    public function updateSuperHeros(SuperHeros $sh)
    {
        $requete = 'UPDATE superheros SET ???;
        $this->db->query($requete);

    }

    public function getAll()
    {
        $requete = ???;
        $req = $this->db->query($requete);

        $persos = array();

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
        {
            ???????????????;
        }

        return $persos;
    }

    public function getById($id)
    {
        $requete = 'SELECT * FROM superheros WHERE id='.$id;
        $req = $this->db->query($requete);

		$donnees = $req->fetch(PDO::FETCH_ASSOC);
        ???????????????;

        return $perso;
    }

    public function afficheAll()
    {
        $shs = $this->getAll();

        $html = '<table border="1">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nom</td>
                            <td>Pouvoir</td>
                            <td>Univers</td>
                            <td>Ville</td>
                            <td>Nom Réel</td>
                            <td>Action</td>
                        </tr>
                        </thead>';

        foreach ($shs as $sh)
        {
			???????????????;        
		}

        $html .= '</table>';

        echo $html;
    }

}

?>

