<?php

// Interface do componente base do relatório
interface ComponenteRelatorio {
    public function geraRelatorio(): string;
}

// Implementação do componente base do relatório
class RelatorioPadrao implements ComponenteRelatorio {
    public function geraRelatorio(): string {
        return "Relatório básico gerado.\n";
    }
}

// Decorator base que implementa a interface ComponenteRelatorio
abstract class Decorator implements ComponenteRelatorio {
    protected $componente;

    public function __construct(ComponenteRelatorio $componente) {
        $this->componente = $componente;
    }

    public function geraRelatorio(): string {
        return $this->componente->geraRelatorio();
    }
}

// Decorator para adicionar funcionalidade de formatação em caixa alta
class CaixaAltaDecorator extends Decorator {
    public function geraRelatorio(): string {
        return strtoupper(parent::geraRelatorio());
    }
}

// Decorator para adicionar funcionalidade de adicionar rodapé ao relatório
class RodapeDecorator extends Decorator {
    public function geraRelatorio(): string {
        return parent::geraRelatorio() . "Rodapé adicionado ao relatório.\n";
    }
}

// Uso dos Decorators
$relatorio = new RelatorioPadrao(); // Componente base

$relatorio = new CaixaAltaDecorator($relatorio); // Adiciona formatação em caixa alta
echo $relatorio->geraRelatorio(); // Mostra o relatório

$relatorio = new RodapeDecorator($relatorio); // Adiciona rodapé
echo $relatorio->geraRelatorio(); // Mostra o relatório com rodapé

?>

