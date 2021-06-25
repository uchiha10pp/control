<?php
include_once "conexion/ConexionBD.php";

class Administrador{
    private $id;
    private $usuario;
    private $password;
    private $email;
    private $nombre;
    private $apellidos;
    private $telefono;
    private $dni;
    private $sexo;
    private $cargo;
    private $estado;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function mostrarUsuariosPorId()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM usuarioss WHERE id=$this->id";

            $resultado = $conn->query($sql);
            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrar()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT u.id, u.usuario, u.nombre, u.apellidos, u.email, u.DNI, u.telefono, u.sexo, u.cargo, u.estado
                    FROM usuarioss as u";

            $resultado = $conn->query($sql);
            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function ActualizarUsuario(int $id, String $usuario, String $password, String $email, String $nombre, String $apellidos, int $telefono, int $dni, String $sexo, String $cargo, String $estado): bool
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "UPDATE usuarioss
                  SET usuario='$usuario', password='$password', email='$email', nombre='$nombre', apellidos='$apellidos', DNI='$dni', telefono='$telefono', sexo='$sexo', cargo='$cargo', estado='$estado'
                  WHERE id=$id";
          $filasAfectadas = $conn->exec($sql);

          if($filasAfectadas != 0){
              $resultado = true;
          }else{
              $resultado = false;
          }

          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }

    public function EliminarUsuario()
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "DELETE FROM usuarioss WHERE id=$this->id";
          $filasAfectadas = $conn->exec($sql);

          if($filasAfectadas != 0){
              $resultado = true;
          }else{
              $resultado = false;
          }

          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }

    public function MostrarPedido()
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();
          $sql = "SELECT p.id_pe, p.nom_pe, p.Estado_pe, p.Precio_pe
                  FROM pedido as p";

          $resultado = $conn->query($sql);
          $conexionDB->cerrarConexion();
          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }

    public function ActualizarRegistro()
    {

    }

    public function EliminarRegistro()
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "DELETE FROM pedido WHERE id_pe=$this->id";
          $filasAfectadas = $conn->exec($sql);

          if($filasAfectadas != 0){
              $resultado = true;
          }else{
              $resultado = false;
          }

          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }

    public function AsignarPersonal()
    {

    }

    public function RegistrarPersonal()
    {

    }
 }
