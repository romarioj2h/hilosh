<?php

/**
 * Created by PhpStorm.
 * User: romario
 * Date: 29/04/17
 * Time: 23:12
 */
class Usuarios
{
    //TODO: verificar se el email, usuario o telefono no está repetido en la base de datos
    public static function Agregar($nombre, $email, $telefono, $usuario, $contrasena, $localidad, $tipo = 'ciudadano')
    {
        global $db;

        if (empty($nombre)) {
            throw new Exception('El nombre es obligatório');
        }
        else if (empty($email)) {
            throw new Exception('El email es obligatório');
        }
        else if (empty($telefono)) {
            throw new Exception('El teléfono es obligatório');
        }
        else if (empty($usuario)) {
            throw new Exception('El usuario es obligatório');
        }
        else if (empty($contrasena)) {
            throw new Exception('La contraseña es obligatória');
        }
        else if (empty($localidad)) {
            throw new Exception('La localidad es obligatória');
        }

        $contrasena = md5($contrasena);

        $sql = "insert into 
                    usuarios (nombre, email, telefono, usuario, contrasena, localidad_codigo, tipo)
                VALUES 
                    ('$nombre', '$email', '$telefono', '$usuario', '$contrasena', $localidad, '$tipo')";
        return $db->query($sql);
    }
}