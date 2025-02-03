<?php 
class Continent {

    /**
     * num continent
     *
     * @var int
     */
    private $num;

    /**
     * libelle continent
     *
     * @var string
     */
    private $libelle;


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
     * Retourne l'ensemble des continents
     *
     * @return Continent[] tableau d'objet continent
     */
    public static function findAll() :array 
    {
        $req=MonPdo::getInstance()->prepare("select * from continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Continent' );
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouver un Cont par son num 
     *
     * @param integer $id num Cont 
     * @return Continent objet continent trouver
     */
    public static function findById(int $id) :Continent
    {
        $req=MonPdo::getInstance()->prepare("select * from continent where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Continent' );
        $req->bindParam(' :id' , $id);
        $req->execute();
        $leResultats=$req->fetch();
        return $leResultats;
    }

    /**
     * permer d'ajouter une Cont
     *
     * @param Continent $continent Cont a ajouter
     * @return integer resultat (1 si l'opertion est reussi, 0 sinon)
     */
    public static function add(Continent $continent) : int
    {
        $req=MonPdo::getInstance()->prepare("insert into continent(libelle)  values( :libelle)");
        $req->bindParam(' :libelle' , $continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modif les Cont
     *
     * @param Continent $continent Cont a modifier
     * @return integer resultat (1 si l'opertion est reussi, 0 sinon)
     */
    public static function update(Continent $continent) : int
    {
        $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
        $req->bindParam(' :id' , $continent->getNum());
        $req->bindParam(' :libelle' , $continent->getLibelle());
        $nb=$req->execute();
        return $nb; 
    }

    /**
     * permet de supp un Cont
     *
     * @param Continent $continent Cont a supp
     * @return integer resultat (1 si l'opertion est reussi, 0 sinon)
     */
    public static function delete(Continent $continent) : int
    {
        $req=MonPdo::getInstance()->prepare("delete from continent where num= :id");
        $req->bindParam(' :id' , $continent->getNum());
        $nb=$req->execute();
        return $nb;
    }
}
?>