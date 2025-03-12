<?php

use PSpell\Config;

    class Livre{
        /**
         * num liv
         * @var int
         */
        private $num;
        /**
         * id
         * @var string
         */
        private $id;

        /**
         * titre 
         * @var string
         */
        private $titre;
        /**
         * nom aut
         * @var string
         */
        private $auteur;

        /**
         * prix
         *
         * @return int
         */
        private $prix;

        /**
         * edit
         * @var string
         */
        private $editeur;

        /**
         * annee
         * @var int;
         */
        private $annee;



        /**
         * genre 
         * @var string
         */
        private $genre;


                //get set num
        /**
         * Get the value of num
         */ 
        public function getNum()
        {
            return $this->num;
        }
        /**
         * Set num
         *@param int $num 
         * @return  self
         */ 
        public function setNum(int $num) :self
        {
            $this->num = $num;
            
            return $this;
        }
        
        

        //get set id
        /**
         * Get id
         *
         * @return  string
         */ 
        public function getId()
        {
                return $this->id;
        }
        /**
         * Set id
         * 
         * @param  string  $id  
         *
         * @return  self
         */ 
        public function setId(string $id)
        {
                $this->id = $id;

                return $this;
        }





        
        // get set titre 
        /**
         * Get titre 
         *
         * @return  string
         */ 
        public function getTitre() 
        {
                return $this->titre;
        }
        /**
         * Set titre
         *
         * @param  string  $titre  
         *
         * @return  self
         */ 
        public function setTitre(string $titre)
        {
                $this->titre = $titre;

                return $this;
        }



        //get set prix
        /**
         * Get prix
         */ 
        public function getPrix()
        {
                return $this->prix;
        }

        /**
         * Set prix
         *
         * @return  self
         */ 
        public function setPrix($prix)
        {
                $this->prix = $prix;

                return $this;
        }



        //get edit
        /**
         * Get nom 
         *
         * @return  string
         */ 
        public function getEditeur()
        {
                return $this->editeur;
        }
        /**
         * Set edit 
         *
         * @param  string  $editeur  
         *
         * @return  self
         */ 
        public function setEditeur(string $editeur)
        {
                $this->editeur = $editeur;

                return $this;
        }



        //get set annee
        /**
         * Get annee 
         *
         * @return  int;
         */ 
        public function getAnnee()
        {
                return $this->annee;
        }
        /**
         * Set annee 
         *
         * @param  int;  $annee 
         *
         * @return  self
         */ 
        public function setAnnee(int $annee)
        {
                $this->annee = $annee;

                return $this;
        }
    




        //get set auteur 
        /**
         * Get auteur
         *
         * @return string
         */ 
        public function getAuteur()
        {
                return $this->auteur;
        }
        /**
         * Set auteur
         *
         * @param  string  $auteur  
         *
         * @return  self
         */ 
        public function setAuteur(string $auteur)
        {
                $this->auteur = $auteur;

                return $this;
        }



        //get set des genre 
        /**
         * Get genre
         *
         * @return  string
         */ 
        public function getGenre()
        {
                return $this->genre;
        }
        /**
         * Set genre
         *
         * @param  string  $genre 
         *
         * @return  self
         */ 
        public function setGenre(string $genre)
        {
                $this->genre = $genre;

                return $this;
        }
        
        
        /***/
        
        /**
         * tous les livre
         *
         * @return Livre[] 
         */
        public static function findAll() :array
        {
            $req=MonPdo::getInstance()->prepare("Select * from livre");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Livre');
            $req->execute();
            $lesResultats=$req->fetchAll();
            return $lesResultats;
        }
        
        /**
         * Trouve livre 
         *
         * @param integer $id 
         * @return Livre 
         */
        public static function findById(int $id) :Livre
        {
            $req=MonPdo::getInstance()->prepare("Select * from livre where num= :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Livre');
            $req->bindParam(':id',$id);
            $req->execute();
            $leResultat=$req->fetch();
            return $leResultat;
        }
        
        
        /**
         * Ajout livre
         *
         * @param Livre $livre 
         * @return integer resultat (1 si l'operation a reussi, 0 sinon)
         */
        public static function add(Livre $livre): int
        {
            $req=MonPdo::getInstance()->prepare("insert into livre values(:num,:isbn,:titre,:prix,:editeur,:annee,:langue,:auteur,:genre)");
            $titre=$livre->getTitre();
            $req->bindParam(':num', $titre);
            $nb=$req->execute();
            return $nb;
        }
        
        
        
        /**
         * modif livre
         *
         * @param Livre $livre 
         * @return integer resultat (1 si l'operation a reussi, 0 sinon)
         */
        public static function update(Livre $livre): int
        {
            $req=MonPdo::getInstance()->prepare("update livre set titre= :titre where num= :id");
            $num=$livre->getNum();
            $titre=$livre->getTitre();
            $req->bindParam(':id',$num);
            $req->bindParam(':titre',$titre);
            $nb=$req->execute();
            return $nb;
        }
        
        
        /**
         * Supp livre
         *
         * @param Livre $livre
         * @return integer
         */
        public static function delete(Livre $livre) :int
        {
            $req=MonPdo::getInstance()->prepare("delete from livre where num= :id");
            $num=$livre->getNum();
            $req->bindParam(':id',$num);
            $nb=$req->execute();
            return $nb;
        }



    }