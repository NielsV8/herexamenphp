<?php
    include_once(__DIR__ ."/Database.php");

    class Task{
        private $task_id;
        private $user_id;
        private $title;
        private $hours;
        private $deadline;

        public function getTaskId()
        {
                return $this->task_id;
        }

        public function setTaskId($task_id): self
        {
                $this->task_id = $task_id;

                return $this;
        }

        public function getTitle()
        {
                return $this->title;
        }

        public function setTitle($title): self
        {
                $this->title = $title;

                return $this;
        }

        public function getHours()
        {
                return $this->hours;
        }

        public function setHours($hours): self
        {
                $this->hours = $hours;

                return $this;
        }

        public function getDeadline()
        {
                return $this->deadline;
        }

        public function setDeadline($deadline): self
        {
                $this->deadline = $deadline;

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

        public function save(){
            $conn = Db::getConnection();
            $query = $conn->prepare("insert into task (title, hours, deadline, user_id) values (:title, :hours, :deadline, :user_id)");
            $query->bindValue(":title", $this->title);
            $query->bindValue(":hours", $this->hours);
            $query->bindValue(":deadline", $this->deadline);
            $query->bindValue(":user_id", $this->user_id);
            $query->execute();
        }

        public static function getTaskById($task_id){
            $conn = Db::getConnection();
            $query = $conn->prepare("select * from task where task_id = :task_id");
            $query->bindValue(":task_id", $task_id);
            $query->execute();
            $task = ($query->fetch());
            return $task;
        }

        public static function getAll(){
            $conn = Db::getConnection();
            $query = $conn->prepare("select * from task");
            $query->execute();
            $task = ($query->fetchAll());
            return $task;
        }

        public static function deleteTask($task_id){
            $conn = Db::getConnection();
            $query = $conn->prepare("delete from task where task_id = :task_id");
            $query->bindValue(":task_id", $task_id);
            $query->execute();
        }
    }