<?php

require_once 'conexion.php';

class Ingreso
{
    private $id;
   
    private $hour;
    private $date;
    private $cliente;
    private $id_print;
    private $id_usuario;
    private $monto;

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
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param mixed $nombre
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $efectivo
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPrint_id()
    {
        return $this->id_print;
    }

    /**
     * @param mixed $virtual
     */
    public function setPrint_id($id_print)
    {
        $this->id_print = $id_print;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    
    public function getMonto()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }


    public function generarCodigo()
    {
        $sql = "select ifnull(max(id) +1, 1) as codigo from ingreso";
        $this->id = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from ingreso 
        where id = '$this->id'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->cliente = $resultado['cliente'];
        $this->hour = $resultado['hour'];
        $this->name = $resultado['name'];
        $this->monto = $resultado['monto'];
    }


    public function insertar()
    {                                                    //id	date	hour	id_print	id_usuario	cliente	monto
        $sql = "insert into ingreso values ('$this->id', '$this->date', '$this->hour', '$this->id_print', '$this->id_usuario','$this->cliente', '$this->monto')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas()
    {
        $sql = "select i.date, i.hour, u.name as usuario, im.name_print as impresora, i.cliente,  i.monto 
        from ingreso as i INNER JOIN usuario as u  ON (i.id=u.id)
        INNER JOIN impresora AS im
         ON im.id = im.id
        ";
        return $this->c_conectar->get_Cursor($sql);
    }

}