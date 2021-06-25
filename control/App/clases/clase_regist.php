<?php
include_once "conexion/ConexionBD.php";

class pedido{
    private $id_pe;
    private $nom_pe;
    private $Estado_pe;
    private $Precio_pe;

    public function getId_pe()
    {
        return $this->id_pe;
    }

    public function setId_pe($id_pe): void
    {
        $this->id_pe = $id_pe;
    }

    public function mostrarRegistroPorId()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM pedido WHERE id_pe=$this->id_pe";

            $resultado = $conn->query($sql);
            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function MostrarRegistro()
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

    public function ActualizarRegistro(int $id_pe, String $nom_pe, String $Estado_pe, String $Precio_pe): bool
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "UPDATE pedido
                  SET nom_pe='$nom_pe', Estado_pe='$Estado_pe', Precio_pe='$Precio_pe'
                  WHERE id_pe=$id_pe";
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

    public function EliminarRegistro()
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "DELETE FROM pedido WHERE id_pe=$this->id_pe";
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
 }
