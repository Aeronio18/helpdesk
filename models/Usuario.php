<?php
require_once (__DIR__ . '/../models/model.php');

class Usuario extends Model {
    // Crear un nuevo usuario
    public function crearUsuario($nombre_usuario, $password, $tipo_usuario) {
        $sql = "INSERT INTO usuarios (nombre_usuario, password, tipo_usuario) 
                VALUES (:nombre_usuario, :password, :tipo_usuario)";
        $params = [
            ':nombre_usuario' => $nombre_usuario,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':tipo_usuario' => $tipo_usuario
        ];
        return $this->insert($sql, $params);
    }

    // Obtener un usuario por su nombre de usuario
    public function obtenerUsuarioPorNombre($nombre_usuario) {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario";
        $params = [':nombre_usuario' => $nombre_usuario];
        return $this->fetchOne($sql, $params);
    }

    // Verificar credenciales de inicio de sesión
    public function verificarCredenciales($nombre_usuario, $password) {
        $usuario = $this->obtenerUsuarioPorNombre($nombre_usuario);
        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        return false;
    }

    // Obtener todos los usuarios
    public function obtenerUsuarios() {
        $sql = "SELECT * FROM usuarios";
        return $this->fetchAll($sql);
    }

    // Obtener todos los técnicos (usuarios de tipo 'Técnico')
    public function obtenerTecnicos() {
        $sql = "SELECT * FROM usuarios WHERE tipo_usuario = 'Técnico'";
        return $this->fetchAll($sql);
    }

    // Eliminar un usuario
    public function eliminarUsuario($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $params = [':id' => $id];
        return $this->execute($sql, $params);
    }
}
?>
