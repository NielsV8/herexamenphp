<?php
    include_once(__DIR__ ."/Database.php");

    class DoList{
        private $title;
        private $user_id;
        private $task_id;
        private $list_id;

        public function getTitle()
        {
                return $this->title;
        }

        public function setTitle($title): self
        {
                $this->title = $title;

                return $this;
        }

        public function getUserId()
        {
                return $this->user_id;
        }

        public function setUserId($user_id): self
        {
                $this->user_id = $user_id;

                return $this;
        }

        public function getTaskId()
        {
                return $this->task_id;
        }

        public function setTaskId($task_id): self
        {
                $this->task_id = $task_id;

                return $this;
        }

        public function getListId()
        {
                return $this->list_id;
        }

        public function setListId($list_id): self
        {
                $this->list_id = $list_id;

                return $this;
        }

        public function save(){
            $conn = Db::getConnection();
            $query = $conn->prepare("insert into list (list_name) values (:title)");
            $query->bindValue(":title", $this->title);
            $query->execute();
        }
    }
