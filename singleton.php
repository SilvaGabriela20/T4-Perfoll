<?php

class UserRegistration {
    private static $instance = null;
    
    private function __construct() {
        // Construtor privado para evitar instanciar diretamente a classe fora dela mesma.
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function registerUser($username, $email, $password) {
        // Lógica para registrar o usuário no sistema.
        // Aqui você poderia adicionar o usuário ao banco de dados ou fazer outras operações necessárias.
        echo "Registrando usuário: $username\n";
    }
}

// Exemplo de uso:
$registration = UserRegistration::getInstance();
$registration->registerUser('usuario123', 'usuario123@example.com', 'senha123');

// Tentativa de criar uma nova instância diretamente resultará num erro, já que o construtor é privado.
//$newRegistration = new UserRegistration(); // Isso não funcionará

// A tentativa de criar uma nova instância através do método estático getInstance() retornará a mesma instância já existente.
$newRegistration = UserRegistration::getInstance();
$newRegistration->registerUser('outroUsuario', 'outro@example.com', 'outraSenha');

