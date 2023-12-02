
// Interface Subject (Assunto)
interface Subject {
    public function registrarObservador(Observador $observador);
    public function removerObservador(Observador $observador);
    public function notificarObservadores(string $mensagem);
}

// Interface Observer (Observador)
interface Observador {
    public function receberNotificacao(string $mensagem);
}

// Subject Concreto (Assunto Concreto)
class Notificador implements Subject {
    private $observadores = [];

    public function registrarObservador(Observador $observador) {
        $this->observadores[] = $observador;
    }

    public function removerObservador(Observador $observador) {
        $index = array_search($observador, $this->observadores);
        if ($index !== false) {
            unset($this->observadores[$index]);
        }
    }

    public function notificarObservadores(string $mensagem) {
        foreach ($this->observadores as $observador) {
            $observador->receberNotificacao($mensagem);
        }
    }

    public function enviarNotificacao(string $mensagem) {
        $this->notificarObservadores($mensagem);
    }
}

// Observador Concreto
class Usuario implements Observador {
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function receberNotificacao(string $mensagem) {
        echo "Usuário {$this->nome} recebeu a notificação: {$mensagem}\n";
    }
}

// Exemplo de uso
$notificador = new Notificador();

$usuario1 = new Usuario("João");
$usuario2 = new Usuario("Maria");

$notificador->registrarObservador($usuario1);
$notificador->registrarObservador($usuario2);

$notificador->enviarNotificacao("Nova atualização disponível!");
