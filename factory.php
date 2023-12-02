<?php

// Interface Produto
interface FormaGeometrica {
    public function calcularArea();
}

// Produto Concreto 1: Círculo
class Circulo implements FormaGeometrica {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * pow($this->raio, 2);
    }
}

// Produt


