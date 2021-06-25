<?php
include_once "conexion/ConexionBD.php";

class cliente{
    private $id_cli;
    private $nom_user;
    private $ape_user;
    private $telf_user;
    private $dni_user;
    private $sex_user;
    private $direc_user;

    public function getId_cli()
    {
        return $this->id_cli;
    }

    public function setId_cli($id_cli): void
    {
        $this->id_cli = $id_cli;
    }

    public function mostrarContagiadosPorId()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM contagiados WHERE id_cont=$this->id_cont";

            $resultado = $conn->query($sql);
            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function MostrarContagiados()
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();
          $sql = "SELECT c.id_cont, c.nom_user, c.ape_user, c.telf_user, c.dni_user, c.sex_user, c.direc_user
                  FROM contagiados as c";

          $resultado = $conn->query($sql);
          $conexionDB->cerrarConexion();
          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }

    public function ActualizarContagiados(int $id_cli, String $nom_user, String $ape_user, int $telf_user, int $dni_user, String $sex_user, String $direc_user): bool
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "UPDATE contagiados
                  SET nom_user='$nom_user', ape_user='$ape_user', telf_user='$telf_user', dni_user='$dni_user', sex_user='$sex_user', direc_user='$direc_user'
                  WHERE id_cli=$id_cont";
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

    public function EliminarContagiados()
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "DELETE FROM contagiados WHERE id_cont=$this->id_cont";
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
