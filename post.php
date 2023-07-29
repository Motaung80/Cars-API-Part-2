<?php 
    class Post {
        // DB stuff
        private $conn;
        private $table = 'cars';

        // Post Properties
        public $id_trim;
        public $make;
        public $model;
        public $max_speed_km_per_h;
        public $body_type;
        public $engine_type;
        public $transmission;
        public $drive_wheels;
        public $number_of_cylinders;
        public $year_from;
        //public $created_at;

        // Singleton instance
        private static $instance = null;

        // Private constructor
        private function __construct($db) {
            $this->conn = $db;
        }

        // Get the singleton instance
        public static function getInstance($db) {
            if (self::$instance == null) {
                self::$instance = new Post($db);
            }
            return self::$instance;
        }
        
        // Get Posts
        public function read($search = array()) {
            // Create query
            $query = 'SELECT id_trim, make, model, max_speed_km_per_h, body_type, engine_type, transmission, drive_wheels, number_of_cylinders, year_from
                    FROM ' . $this->table;

            // Add WHERE clause if search criteria provided
            if (!empty($search)) {
                $where_clause = ' WHERE ';
                $i = 0;
                foreach ($search as $key => $value) {
                    if ($i > 0) {
                        $where_clause .= ' AND ';
                    }
                    $where_clause .= $key . ' = "' . $value . '"';
                    $i++;
                }
                $query .= $where_clause;
            }

            // Execute query
            $result = mysqli_query($this->conn, $query);

            return $result;
        }
    }
?>

