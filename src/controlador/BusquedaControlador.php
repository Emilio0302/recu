<?php

namespace dwesgram\controlador;

use dwesgram\modelo\BusquedaBd;

class BusquedaControlador extends Controlador
{
    public function busca(): array|null
    {
        if ($this->denegar()) {
            return null;
        }
        if (!$_POST || !$_POST['nombre']) {
            $this->vista = "busqueda/busca";
            return null;
        }

        $nombre = htmlspecialchars(trim($_POST['nombre']));
        if (empty($nombre)) {
            $this->vista = "busqueda/busca";
            return null;
        }

        $this->vista = "busqueda/busca";
        return BusquedaBd::filtrar($nombre);
    }
}