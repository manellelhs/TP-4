<?php

    class Genre{
        /**
         * num genre
         * @var int
         */
        private $num;

        /**
         * lib genre
         * @var string
         */
        private $libelle;



        /**
         * Get num
         */ 
        public function getNum()
        {
            return $this->num;
        }

        /**
         * lit lib
         *
         * @return string
         */
        public function getLibelle() : string
        {
            return $this->libelle;
        }

        /**
         * ecrit lib
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
             * Set num du genre
             *@param int $num 
             * @return  self
             */ 
            public function setNum(int $num) :self
            {
                        $this->num = $num;

                        return $this;
            }

        /**
         * tous les genres
         *
         * @return Genre[] 
         */
        public static function findAll() :array
        {
            $req=MonPdo::getInstance()->prepare("Select * from genre");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
            $req->execute();
            $lesResultats=$req->fetchAll();
            return $lesResultats;
        }

        /**
         * Trouver genre
         *
         * @param integer $id 
         * @return Genre 
         */
        public static function findById(int $id) :Genre
        {
            $req=MonPdo::getInstance()->prepare("Select * from genre where num= :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
            $req->bindParam(':id',$id);
            $req->execute();
            $leResultat=$req->fetch();
            return $leResultat;
        }


        /**
         * Ajouter
         *
         * @param Genre $genre 
         * @return integer resultat (1 si l'operation a reussi, 0 sinon)
         */
        public static function add(Genre $genre): int
        {
            $req=MonPdo::getInstance()->prepare("insert into genre(libelle) values(:libelle)");
            $libelle=$genre->getLibelle();
            $req->bindParam(':libelle', $libelle);
            $nb=$req->execute();
            return $nb;
        }



        /**
         * modif
         *
         * @param Genre $genre 
         * @return integer resultat (1 si l'operation a reussi, 0 sinon)
         */
        public static function update(Genre $genre): int
        {
            $req=MonPdo::getInstance()->prepare("update genre set libelle= :libelle where num= :id");
            $num=$genre->getNum();
            $libelle=$genre->getLibelle();
            $req->bindParam(':id',$num);
            $req->bindParam(':libelle',$libelle);
            $nb=$req->execute();
            return $nb;
        }


        /**
         * Supp genre
         *
         * @param Genre $genre
         * @return integer
         */
        public static function delete(Genre $genre) :int
        {
            $req=MonPdo::getInstance()->prepare("delete from genre where num= :id");
            $num=$genre->getNum();
            $req->bindParam(':id',$num);
            $nb=$req->execute();
            return $nb;
        }

    }