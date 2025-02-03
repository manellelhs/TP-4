<?php 
class Nationalite {

    /**
     * num Nationalité
     *
     * @var int
     */
    private $num;

    /**
     * libelle Nationalité
     *
     * @var string
     */
    private $libelle;
    
    /**
     * num Continent (cle etrangere) relier a num de cont
     *
     * @var int
     */
    private $numContinent;

    /**
     * lire le num 
     */
    public function getNum() 
    {
    return $this->num;
    }

    /**
     * lire le libelle 
     */
    public function getLibelle() : string
    {
    return $this->libelle;
    }

    /**
     * ecrire dans libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle) : self
    {
    $this->libelle = $libelle;
    return $this;
    }

    /**
     * renvoie l'objet continent
    *
    * @return Continent
    */
    public function getNumContinent() : Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * ecrire le numContinent
     *
     * @param Continent $continent
     * @return self
     */
    public function setNumContinent(Continent $continent) : self
    {
        $this->numContinent = $continent->getNum();
        return $this;
    }


    /**
     * Retourne l'ensemble des Nationalité
     *
     * @return Nationalite[] tableau d'objet Nationalité
     */
    public static function findAll() :array 
    {
        $req=MonPdo::getInstance()->prepare("select n.num as 'numero', n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouver une Nationalité par son num 
     *
     * @param integer $id num Nationalité 
     * @return Nationalite objet Nationalité trouver
     */
    public static function findById(int $id) :Nationalite
    {
        $req=MonPdo::getInstance()->prepare("select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Nationalite' );
        $req->bindParam(' :id' , $id);
        $req->execute();
        $leResultats=$req->fetch();
        return $leResultats;
    }

    /**
     * permer d'ajouter une Nationalité
     *
     * @param Nationalite $nationalite Nationalité a ajouter
     * @return integer resultat (1 si l'opertion est reussi, 0 sinon)
     */
    public static function add(Nationalite $nationalite) : int
    {
        $req=MonPdo::getInstance()->prepare("insert into nationalite (libelle,numContinent)  values( :libelle, :numContinent)");
        $req->bindParam(' :libelle' , $nationalite->getLibelle());
        $req->bindParam(' :numContinent' , $nationalite->numContinent);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modif les Nationalité
     *
     * @param Nationalite $nationalite Nationalité a modifier
     * @return integer resultat (1 si l'opertion est reussi, 0 sinon)
     */
    public static function update(Nationalite $nationalite) : int
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle, numContinent= :numContinent where num= :id");
        $req->bindParam(' :id' , $nationalite->getNum());
        $req->bindParam(' :libelle' , $nationalite->getLibelle());
        $req->bindParam(' :numContinent' , $nationalite->numContinent);
        $nb=$req->execute();
        return $nb; 
    }

    /**
     * permet de supp une Nationalité
     *
     * @param Nationalite $nationalite Nationalité a supp
     * @return integer resultat (1 si l'opertion est reussi, 0 sinon)
     */
    public static function delete(Nationalite $nationalite) : int
    {
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
        $req->bindParam(' :id' , $nationalite->getNum());
        $nb=$req->execute();
        return $nb;
    }

   
}
?>