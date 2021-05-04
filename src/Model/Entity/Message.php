<?php

namespace App\Model\Entity;
use App\Core\AbstractEntity as AE;

    Class Message extends AE{

        private $id;
        private $text;
        private $createdAt;
        private $modifiedAt;
        private $user_id;
        private $topic_id;

        public function __construct($data)
        {
            parent::hydrate($data, $this);
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of text
         */ 
        public function getText()
        {
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setText($text)
        {
                $this->text = $text;

                return $this;
        }

        /**
         * Get the value of createdAt
         */ 
        public function getCreatedAt()
        {
                return $this->createdAt->format("d-m-y à H:i:s");
        }

        /**
         * Set the value of createdAt
         *
         * @return  self
         */ 
        public function setCreatedAt($createdAt)
        {
                $this->createdAt = new \DateTime($createdAt);

                return $this;
        }

        /**
         * Get the value of modifiedAt
         */ 
        public function getModifiedAt()
        {
                return $this->modifiedAt->format("d-m-y à H:i:s");
        }

        /**
         * Set the value of modifiedAt
         *
         * @return  self
         */ 
        public function setModifiedAt($modifiedAt)
        {
                $this->modifiedAt = new \DateTime($modifiedAt);

                return $this;
        }

        /**
         * Get the value of user_id
         */ 
        public function getUser_id()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser_id($user_id)
        {
                $this->user_id = $user_id;

                return $this;
        }

        /**
         * Get the value of topic_id
         */ 
        public function getTopic_id()
        {
                return $this->topic_id;
        }

        /**
         * Set the value of topic_id
         *
         * @return  self
         */ 
        public function setTopic_id($topic_id)
        {
                $this->topic_id = $topic_id;

                return $this;
        }
    }
