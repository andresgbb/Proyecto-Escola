<?php 
    
// El patrón Singleton nos permite crear una única instancia de una clase, de forma que no se puedan crear más instancias de la misma, y proporciona un punto de acceso global a dicha instancia. Optimizando así el uso de recursos.
declare (strict_types = 1);
require 'config.php';
class DatabaseConnection {
    // Utilizamos el patrón Singleton para crear una única instancia de la conexión a la base de datos
    protected static $instance = null;
    protected ?PDO $connection;

    protected bool $connected = false;
    
    // Definimos los datos de conexión a la base de datos
    public function __construct(string $host, string $username, string $password, string $dbName) {
        // $host = "localhost";
        // $username = "escola";
        // $password = "andres";
        // $dbName = "escola";
        try{
            // Creamos la conexión
            $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username,$password);
            $this->connected = true;
        }
        catch(PDOException $ex){
            throw new PDOException("DB Connection Failure: " . $ex->getMessage());
            
        }
        
    }
    // public static function getInstance(string $host, string $username, string $password, string $dbName) {
    //     if (!self::$instance) {
    //         self::$instance = new self($host, $username, $password, $dbName);
    //     }

    //     return self::$instance;
    // }

    //CREAREMOS UNA FUNCION PARA PREPARAR LA SENTENCIA SQL
    public function prepareQuery(string $query){
        return $this->connection->prepare($query);
    }
    // Método para obtener la instancia de la conexión a la base de datos
    /*
    public static function getInstance() {
        // Comprobará que no exista ninguna instancia creada previamente
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    */
    // FUNCION PARA DESTRUIR LA CONEXION 
    public function __destruct(){
        $this->closeConnection();
    }
    // Cerramos la conexión a la base de datos
    public function closeConnection(){
        if ($this->connected) {
            $this->connection = null;
            $this->connected = false;
        }
    }
    //FUNCION PARA PREGUNTAR SI SE HA CONECTADO A LA BASE DE DATOS
    public function isConnected(){
        return $this->connected;
    }
    // Obtenemos la conexión a la base de datos
    public function getConnection() {
        return $this->connection;
    }
    //FUNCION VIEJA PARA ESCRIBIR UNA SENTENCIA
    public function writeQuery(string $query): bool {
        $result = $this->connection->query($query);
        return $result;
    }
    //FUNCION PARA LEEREL RESULTADO DE UNA SENTENCIA SQL
    public function readQuery(string $query): array {
        $dataset = [];
        $result = $this->connection->query($query);
        if ($result != false) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $dataset[] = $row;
            }
        }
        return $dataset;
    }
    //FUNCION LA CUAL AGREGAREMOS UN REGISTRO DE MATRICULA A LA BASE DE DATOS 
    public function addMatricula(int $id_asignatura, int $id_alumno){
        try{
            $preparedQuery = $this->prepareQuery("INSERT INTO matricula (id_asignatura, id_alumno) 
            VALUES (:id_asignatura,:id_alumno)");
            $preparedQuery->bindParam(':id_asignatura', $id_asignatura);
            $preparedQuery->bindParam(':id_alumno', $id_alumno);
            $preparedQuery->execute();
            
        }catch(PDOException $ex){
            throw new PDOException("Error al insertar matricula". $ex->getMessage());
        }
    }

    //FUNCION PARA OBTENER LOS DATOS DE LA MATRICLA DE UN ALUMNO POR EL ID DEL ALUMNO
    public function getMatricula(int $id_alumno){
        try{
            $preparedQuery = $this->prepareQuery("SELECT * from matricula WHERE id_alumno=:id_alumno");
            $preparedQuery->bindParam(':id_alumno', $id_alumno);
            $preparedQuery->execute();
            $userDataBase = $preparedQuery->fetchAll(PDO::FETCH_ASSOC); //fetchAll sirve para cuando pillamos los datos de la base de datos lo transformamos en un array asociativo

            return $userDataBase;
        }catch(PDOException $e){
            throw new PDOException("Error al buscar la matricula". $e->getMessage());
        }
    }
    //FUNCION PARA OBTENER UN PROFESOR POR SU ID EN LA TABLA USERS
    public function getProfesorName($id_user){
        try{
            $preparedQuery = $this->prepareQuery("SELECT * from users WHERE id=:id_user");
            $preparedQuery->bindParam(':id_user', $id_user);
            $preparedQuery->execute();
            $userDataBase = $preparedQuery->fetchAll(PDO::FETCH_ASSOC); //fetchAll sirve para cuando pillamos los datos de la base de datos lo transformamos en un array asociativo

            return $userDataBase;
        }catch(PDOException $e) {
            throw new PDOException("Error al buscar profesor". $e->getMessage());
        }   
    }
    //FUNCION PARA OBTENER LA ID DE USUARIO POR LA ID DEL PROFESOR
    public function getProfesorIdUser($id_profesor){
        try{
            $preparedQuery = $this->prepareQuery("SELECT * from profesores WHERE id_user=:id_profesor");
            $preparedQuery->bindParam(':id_profesor', $id_profesor);
            $preparedQuery->execute();
            $userDataBase = $preparedQuery->fetchAll(PDO::FETCH_ASSOC); //fetchAll sirve para cuando pillamos los datos de la base de datos lo transformamos en un array asociativo
            return $userDataBase;
        }catch(PDOException $ex){
            throw new PDOException("Error al buscar profesor ID". $ex->getMessage());
        };
    }
    //FUNCIO PARA OBTENER EL ALUMNO POR SU ID 
    public function getAlumno(int $id_user){
        try{
            $preparedQuery = $this->prepareQuery("SELECT * from alumnos WHERE id_user=:id_user" );
            $preparedQuery->bindParam(':id_user', $id_user);
            $preparedQuery->execute();
            $userDataBase = $preparedQuery->fetchAll(PDO::FETCH_ASSOC);
            return $userDataBase;
        }catch(PDOException $ex){
            throw new PDOException("Erro al encontrar alumno". $ex->getMessage());
        }
    }
    //FUNCION PARA OBTENER LAS NOTAS
    public function getNotas(int $id_alumno){
        try{
            $preparedQuery = $this->prepareQuery("SELECT * from notas WHERE id_alumno=:id_alumno");
            $preparedQuery->bindParam(':id_alumno', $id_alumno);
            $preparedQuery->execute();
            $userDataBase = $preparedQuery->fetchAll(PDO::FETCH_ASSOC); //fetchAll sirve para cuando pillamos los datos de la base de datos lo transformamos en un array asociativo
            return $userDataBase;
        }catch(PDOException $ex){
            throw new PDOException('Error al buscar alumno'. $ex->getMessage());
        }

    }
    //FUNCION PARA OBTENER LAS ASIGNATURAS
    public function getAsignatura(int $id) {
        try{
            $preparedQuery = $this->prepareQuery("SELECT * from asignaturas WHERE id=:id");
            $preparedQuery->bindParam(':id', $id);
            $preparedQuery->execute();
            $userDataBase = $preparedQuery->fetchAll(PDO::FETCH_ASSOC); //fetchAll sirve para cuando pillamos los datos de la base de datos lo transformamos en un array asociativo

            return $userDataBase;
        }catch(PDOException $e){
            throw new PDOException("Error al buscar la asignatura". $e->getMessage());
        }
    }
    //FUNCION PARA OBTENER EL USUARIO
    public function getUser(string $email){
        try{
            $preparedQuery = $this->prepareQuery("SELECT * from users WHERE email=:email");
            $preparedQuery->bindParam(':email', $email);
            $preparedQuery->execute();

            $userDataBase = $preparedQuery->fetchAll(PDO::FETCH_ASSOC); //fetchAll sirve para cuando pillamos los datos de la base de datos lo transformamos en un array asociativo

            return $userDataBase;
        }catch(PDOException $ex){
            throw new PDOException("Error al encontrar el usuario -->" . $ex->getMessage());
        }
    }
    //FUNCION PARA AGREGAR UN USUARIO Y A LA VEZ LO AGREGAMOS A LA TABLA DE ALUMNOS YA QUE PORCEFECTO LOS USAURIOS CREADOS POR LA PAGINA SON ALUMNOS
    public function addUser(string $name,string $lastname, string $email, string $password){  
       try{
            $preparedQuery = $this->prepareQuery("INSERT INTO users (id_rol, nombre, apellido, email, password) 
            VALUES (1,'$name','$lastname',:email,:password)");
            $preparedQuery->bindParam(':password', $password);
            $preparedQuery->bindParam(':email', $email);
            $preparedQuery->execute();
       }catch(PDOException $ex){
            throw new PDOException("Error al crear el usuario -->" . $ex->getMessage());
       };
       try {
            $user = $this->getUser($email);
            $userid = $user[0]['id']; // Obtén el valor de 'id' del primer resultado
            $preparedQuery = $this->prepareQuery("INSERT INTO alumnos (id_user) 
            VALUES (:userid)");
            $preparedQuery->bindParam(':userid', $userid);
            $preparedQuery->execute();
        } catch (PDOException $ex) {
             throw new PDOException("Error al crear el Alumno -->" . $ex->getMessage());
        };

    }

    public function prepare($sql){
        // Prepara y devuelve una declaración preparada
        return $this->connection->prepare($sql);
    }


    // Este método, al estar vacío, evitará que se pueda clonar el objeto
    private function __clone() {
    }
}

?>