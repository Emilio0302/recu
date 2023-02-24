<?php
namespace dwesgram\modelo;

use dwesgram\modelo\BaseDatos;
use dwesgram\modelo\Usuario;

class BusquedaBd
{
    use BaseDatos;

    public static function filtrar(string $nombre): array|null
    {
        try {
            $conexion = BaseDatos::getConexion();
            $sentencia = $conexion->prepare("select * from usuario where nombre like ?");
            $nombre = '%' . $nombre . '%';
            $sentencia->bind_param("s", $nombre);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            $a = [];
            while (($fila = $resultado->fetch_assoc()) != null) {
                $usuario = new Usuario(
                    id: $fila['id'],
                    nombre: $fila['nombre'],
                    email: $fila['email'],
                    clave: $fila['clave'],
                    avatar: $fila['avatar'],
                    registrado: $fila['registrado']
                );
                $a[] = $usuario;
            }
            return $a;
        } catch (\Exception $e) {
            return null;
        }
    }
}
