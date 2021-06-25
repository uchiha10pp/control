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

    public function mostrarPedidosPorId()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM registro WHERE id_pe=$this->id_pe";

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
          $sql = "SELECT r.id_re, r.nom_re, r.Estado_re
                  FROM registro as r";

          $resultado = $conn->query($sql);
          $conexionDB->cerrarConexion();
          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }

    public function ActualizarRegistro(int $id_re, String $nom_re, String $Estado_re, String $registro_re): bool
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "UPDATE registro
                  SET nom_re='$nom_re', Estado_re='$Estado_re'
                  WHERE id_re=$id_re";
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

          $sql = "DELETE FROM registro WHERE id_re=$this->id_re";
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
