<?php 

class Db 
{
    private $server = 'localhost';
    private $user ='root';
    private $password = '';

    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->server, $this->user, $this->password);

        $this->setUp();
    }

    private function setUp()
    {
        
        if($this->conn->connect_error){
            die('kapcsolódási hiba!');
        }

        $db = mysqli_select_db($this->conn, 'fakeproducts');

        if(!$db){
            $sql = 'CREATE DATABASE fakeproducts';

            if($this->conn->query($sql)){
                $db = mysqli_select_db($this->conn, 'fakeproducts');
                $sql = "CREATE TABLE products (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(30) NOT NULL,
                    descr VARCHAR(255),
                    price DECIMAL(10, 2) NOT NULL,
                    img VARCHAR(255))";
                if(!mysqli_query($this->conn, $sql)){
                    die("Tábla létrehozása sikertelen!");
                }
            }
            else{
                die("Adatbázis létrehozás hiba!");
            }
        }
    }
    public function __destruct()
    {
        $this->conn->close();
    }
    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function getProduct(int $id){
        $sql = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();
        return $result->fetch_assoc();
    }

    public function createProduct(string $title, string $description, float $price, string $img)
    {
        $sql = $this->conn->prepare("INSERT INTO products ( title, descr, price, img) VALUES (?,?,?,?)");
        $sql->bind_param("ssds", $title, $description, $price, $img);

        return $sql->execute();
    }

    public function deleteProduct(int $id)
    {
        $sql = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        $sql->bind_param('i', $id);

        return $sql->execute();
    }

    public function updateProduct(int $id, string $title, string $description, float $price, string $img)
    {
        $sql = $this->conn->prepare("UPDATE products SET title = ?, descr = ?, price = ?, img = ? WHERE id = ?");
        $sql->bind_param("ssdsi", $title, $description, $price, $img, $id);

        return $sql->execute();
    }
    public function deleteAll(){
        $sql = "DELETE FROM products";
        
        return $this->conn->query($sql);
    }
}