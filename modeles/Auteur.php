<?php

    class Auteur{
        
        /**
         * nom auteur
         * @var string
         */
        private $nom;
        /**
         *  prenom auteur
         * @var string
         */
        private $prenom;
        /**
         * num auteur
         * @var int
         */
        private $num;
        /**
         * nationalite
         * @var string
         */
        private $numNationalite;
    


        // get set nom 
        /**
         * Get nom del'auteur
         *
         * @return  string
         */ 
        public function getNom()
        {
                return $this->nom;
        }
        /**
         * Set nom auteur
         *
         * @param  string  $nom  nom auteur
         *
         * @return  self
         */ 
        public function setNom(string $nom)
        {
                $this->nom = $nom;

                return $this;
        }

//  get set prenom
        /**
         * Get prenom auteur
         *
         * @return  string
         */ 
        public function getPrenom()
        {
                return $this->prenom;
        }
        /**
         * Set prenom auteur
         *
         * @param  string  $prenom  prenom auteur
         *
         * @return  self
         */ 
        public function setPrenom(string $prenom)
        {
                $this->prenom = $prenom;

                return $this;
        }

        //  get set num
        /**
         * Get num auteur
         *
         * @return  int
         */ 
        public function getNum()
        {
                return $this->num;
        }
        /**
         * Set num auteur
         *
         * @param  int  $num  nume auteur
         *
         * @return  self
         */ 
        public function setNum(int $num)
        {
                $this->num = $num;

                return $this;
        }



        



        // get set nat 
        /**
         * Get nat
         *
         * @return Nationalite
         */ 
        public function getNationalite(): Nationalite
        {       
                return Nationalite::findById($this->numNationalite); 
        }
        /**
         * Set nat
         *
         * @return  self
         */ 
        public function setNationalite(Nationalite $nationalite) :self
        {
                $this->numNationalite = $nationalite->getNum();
                return $this;
        }


        /**
         * tous les auteurs
         *
         * @return Auteur[]
         */
        public static function findAll() :array
        {
            $req=MonPdo::getInstance()->prepare("Select auteur.*, nationalite.libelle as libnation from auteur join nationalite on auteur.numNationalite=nationalite.num");
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->execute();
            $lesResultats=$req->fetchAll();
            return $lesResultats;
        }

        /**
         * nom auteur
         *
         * @param integer $id num auteur
         * @return Auteur  auteur trouver
         */
        public static function findById(int $id) :Auteur
        {
            $req=MonPdo::getInstance()->prepare("Select * from auteur where num= :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Auteur');
            $req->bindParam(':id',$id);
            $req->execute();
            $leResultat=$req->fetch();
            return $leResultat;
        }


        /**
         * Ajout auteur
         *
         * @param Auteur $auteur ajouter
         * @return integer resultat (1 si l'operation a reussi, 0 sinon)
         */
        public static function add(Auteur $auteur): int
        {
            $req=MonPdo::getInstance()->prepare("insert into auteur(nom,prenom,nationalite) values(:nom,:prenom,:nationalite)");
            $nom=$auteur->getNom();
            $prenom=$auteur->getPrenom();
            $nationalite=$auteur->getNationalite()->getNum();
            $req->bindParam(':nom',$nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':nationalite', $nationalite);
            $nb=$req->execute();
            return $nb;
        }



        /**
         * modif auteur
         *
         * @param Auteur $auteur modifier
         * @return integer resultat (1 si l'operation a reussie, 0 sinon)
         */
        public static function update(Auteur $auteur): int
        {
            $req=MonPdo::getInstance()->prepare("update auteur set(nom=:nom, prenom=:prenom, nationalite=:nationalite) where num= :id");
            $num=$auteur->getNum();
            $nom=$auteur->getNom();
            $prenom=$auteur->getPrenom();
            $nationalite=$auteur->getNationalite()->getNum;

            $req->bindParam(':id',$num);
            $req->bindParam(':nom',$nom);
            $req->bindParam(':prenom',$prenom);
            $req->bindParam(':nationalite',$nationalite);
            $nb=$req->execute();
            return $nb;
        }


        /**
         * Supp auteur
         *
         * @param Auteur $auteur
         * @return integer
         */
        public static function delete(Auteur $auteur) :int
        {
            $req=MonPdo::getInstance()->prepare("delete from auteur where num= :id");
            $num=$auteur->getNum();
            $req->bindParam(':id',$num);
            $nb=$req->execute();
            return $nb;
        }

        


    }