<?php

require_once 'conexion.php';

class Impresora
{
    private $id;
   
    private $name;
    
    /**
     * Banco constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id_banco
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $nombre
     */
    public function setName($name)
    {
        $this->hour = $name;
    }

    /**
     * @return mixed
     */
   
    public function generarCodigo()
    {
        $sql = "select ifnull(max(id) +1, 1) as codigo from impresora";
        $this->id = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from impresora
        where id = '$this->id'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->cliente = $resultado['name'];
       
    }


    public function insertar()
    {
        $sql = "insert into usuario values ('$this->id', '$this->name')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas()
    {
        $sql = "select * 
        from impresora ";
        return $this->c_conectar->get_Cursor($sql);
    }

}