<?php
class Konekcija{
    private $conn;
    function __construct(){
    $this->conn = new mysqli('localhost','root','');
    if($this->conn->error) {
        die("Greska pri povezivanju: $this->conn->error");
    }
    

    $this->conn->query("CREATE DATABASE IF NOT EXISTS `MP_2_1`");
    $this->conn->select_db('mp_2_1');

    $this->conn->query("CREATE TABLE IF NOT EXISTS `user` ( `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , 
    PRIMARY KEY (`id`), UNIQUE `uname` (`username`(50))) ENGINE = InnoDB;");
    $this->conn->query("INSERT IGNORE INTO `user`(`username`,`password`) VALUES ('admin@admin','$2y$10\$yz9NtcVZkIMQPSB1cIrcAuFlR08lfWhTl667vtzOLRBd3JXlztDVq')");

    $this->conn->query("CREATE TABLE IF NOT EXISTS `base_book` ( `book_id` INT NOT NULL, 
    `title` VARCHAR(50) NOT NULL , `autor` VARCHAR(50) NOT NULL , `edition` TEXT NOT NULL , 
    `year_of_pb` INT NOT NULL DEFAULT '1999' , `price` INT NOT NULL , `img` TEXT NOT NULL , 
    PRIMARY KEY (`book_id`)) ENGINE = InnoDB;");

    $this->conn->query("INSERT IGNORE INTO `base_book`(`book_id`, `title`, `autor`, `edition`, `year_of_pb`,
    `price`,`img`) VALUES (1,'Maske su brzo spale','Milorad Komrakov','Publicistika',2021,300,'./slike/maske-su-brzo-pale.png'),
    (2,'Skrovište za tajnu','Jelena Kalajdžija','Dečija knjiga',2021,450,'./slike/skroviste.jpg'),
    (3,'Svirao je i razbojnicima','Nandor Gion','Publicistika',2019,650,'./slike/svirao je razbojnicima.jpg'),
    (4,'Korona se otrgla kontroli','Milorad Komrakov','Publicistika',2021,450,'./slike/korona-se-otrgla-kontroli.png'),
    (5,'Zverstva Bugara i Austro-Nemaca','Arčibald Rajs','Istorija',2021,550,'./slike/zverstva-bugara.png'),
    (6,'Karma-Jogijev vodič za kreiranje sopstvene sudbine','Sadhguru Đagi Vasudev','Psiholigija',2020,1350,'./slike/karma.png'),
    (7,'Nemanjići-Biografija','Luka Mičeta','Istorija',2017,1450,'./slike/nemanjici.png'),
    (8,'Srpski vojnik u velikom ratu','Dušan M. Babac','Istorija',2016,1350,'./slike/srpski-vojnik.jpg'),
    (9,'Ubica iz Vuhana','Milorad Komrakov','Publicistika',2020,750,'./slike/ubica-iz-vuhana.png'),
    (10,'Duše moje spas','Dragan Topolić','Beletristika',2016,750,'./slike/duse-moje-spas.jpg'),
    (11,'Zagrljaj vetrova','Elen Dorion','Beletristika',2015,650,'./slike/zagrljaj-vetrova.jpg'),
    (12,'Nastanak evropskih jezika','Mario Alinei','Istorija',2020,1250,'./slike/nastanak-evropskih-jezika.png'),
    (13,'Antonije i lav','Dušan Belča','Beletristika',2020,950,'./slike/antonije-i-lav.jpg'),
    (14,'Jecaji iz kamena','Nenad Karadinović','Beletristika',2021,850,'./slike/jecaji-u-vremenu.jpg'),
    (15,'Bajka o slomljenom mesecu','Kristijan Krigelstajn','Beletristika',2019,1050,'./slike/bajka-o-slomljenom-mesecu.jpg'),
    (16,'Vidi nas sad','Gejr Guliksen','Beletristika',2022,1100,'./slike/vidi-nas-sad.jpg'),
    (17,'Vecera na rudniku','Ratko Adamović','Beletristika',2021,850,'./slike/vecera-na-rudniku.jpg')");
    }

    function proveriKorisnika($user, $pass): bool {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("ss",$pass,$user);
        $prepared->execute();
        return $prepared->get_result()->num_rows == 1;
    }

    private function prepareSelectUser() {
        return $this->conn->prepare("SELECT * FROM `user` WHERE `username`=?");
    }

    function registrujKorisnika($user,$pass): bool {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("s",$user);
        $prepared->execute();
        $res = $prepared->get_result();
        if($res->num_rows == 1) {
            return false;
        } 
        $enc_pass = password_hash($pass,PASSWORD_BCRYPT);
        $statement = $this->conn->prepare("INSERT INTO `user`(`username`,`password`) VALUES (?,?)");
        $statement->bind_param("ss",$user,$enc_pass);
        $statement->execute();
        return true;
    }


    function proveriKorisnika1($user, $pass): bool {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("s",$user);
        $prepared->execute();
        $res = $prepared->get_result();
        if($res->num_rows == 1) {
            $row = $res->fetch_assoc();
            return password_verify($pass,$row['password']);
        }
        return false;
    }

    function nizKnjiga() {
        $query_res = $this->conn->query("SELECT * FROM `base_book`");
        $niz_knjiga = [];
        foreach ($query_res as $row) {
            array_push($niz_knjiga,[$row['book_id'],$row['title'],$row['autor'],$row['edition'],
            $row['year_of_pb'],$row['price'],$row['img']]);
        }
        return $niz_knjiga;
    }

    
}

$conn = new Konekcija();

?>