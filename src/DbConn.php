<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 24/11/2016
 * Time: 21:37
 */
class DbConn
{
    /**
     * Instance de la classe SPDO
     *
     * @var DbConn
     * @access private
     */
    private $PDOInstance = null;

    /**
     * Instance de la classe SPDO
     *
     * @var DbConn
     * @access private
     * @static
     */
    private static $instance = null;

    /**
     * Constante: nom d'utilisateur de la bdd
     *
     * @var string
     */
    const USER = 'root';

    /**
     * Constante: hôte de la bdd
     *
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Constante: hôte de la bdd
     *
     * @var string
     */
    const PASSWORD = '';

    /**
     * Constante: nom de la bdd
     *
     * @var string
     */
    const DB = 'db_SciMs';

    /**
     * Constructeur
     *
     * @param void
     * @return void
     * @see PDO::__construct()
     */
    private function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:dbname=' . self::DB . ';host=' . self::HOST, self::USER, self::PASSWORD);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            die();
        }
    }

    /**
     * Crée et retourne l'objet
     *
     * @access public
     * @static
     * @param void
     * @return DbConn $instance
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DbConn();
        }
        return self::$instance;
    }

    /**
     * Exécute une requête SQL avec PDO
     *
     * @param string $query La requête SQL
     * @return PDOStatement Retourne l'objet PDOStatement
     */
    public function query($query)
    {
        return $this->PDOInstance->query($query);
    }

    /**
     * Exécute une requête SQL préparée avec PDO
     *
     * @param string $query La requête SQL
     * @param array $statement template de requête SQL valide pour le serveur de base de données cible
     * @return PDOStatement Retourne l'objet PDOStatement
     */
    public function execute($query, array $statement)
    {
        $request = $this->PDOInstance->prepare($query);
        return $request->execute($statement);

    }
}