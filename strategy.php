<?php

// Interface Strategy
interface EstrategiaOrdenacao {
    public function ordenar(array $lista): array;
}

// Estratégia Concreta 1: Ordenação por Bubble Sort
class BubbleSort implements EstrategiaOrdenacao {
    public function ordenar(array $lista): array {
        $n = count($lista);
        do {
            $trocou = false;
            for ($i = 0; $i < $n - 1; $i++) {
                if ($lista[$i] > $lista[$i + 1]) {
                    $temp = $lista[$i];
                    $lista[$i] = $lista[$i + 1];
                    $lista[$i + 1] = $temp;
                    $trocou = true;
                }
            }
        } while ($trocou);
        return $lista;
    }
}

// Estratégia Concreta 2: Ordenação por Quick Sort
class QuickSort implements EstrategiaOrdenacao {
    public function ordenar(array $lista): array {
        $n = count($lista);
        if ($n <= 1) {
            return $lista;
        }

        $pivot = $lista[0];
        $menor = $maior = [];

        for ($i = 1; $i < $n; $i++) {
            if ($lista[$i] < $pivot) {
                $menor[] = $lista[$i];
            } else {
                $maior[] = $lista[$i];
            }
        }

        return array_merge($this->ordenar($menor), [$pivot], $this->ordenar($maior));
    }
}

// Contexto: Utiliza a estratégia de ordenação selecionada
class Ordenador {
    private $estrategia;

    public function __construct(EstrategiaOrdenacao $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function ordenarLista(array $lista): array {
        return $this->estrategia->ordenar($lista);
    }

    public function setEstrategia(EstrategiaOrdenacao $estrategia) {
        $this->estrategia = $estrategia;
    }
}

// Exemplo de uso
$lista = [8, 3, 1, 5, 9, 2, 7, 4, 6];

// Utilizando Bubble Sort inicialmente
$ordenador = new Ordenador(new BubbleSort());
$listaOrdenada = $ordenador->ordenarLista($lista);
echo "Ordenado por Bubble Sort: " . implode(", ", $listaOrdenada) . "\n";

// Trocar a estratégia para Quick Sort
$ordenador->setEstrategia(new QuickSort());
$listaOrdenada = $ordenador->ordenarLista($lista);
echo "Ordenado por Quick Sort: " . implode(", ", $listaOrdenada) . "\n";

?>
