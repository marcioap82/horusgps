<?php
class Veiculo extends TRecord
{
    const TABLENAME = 'veiculo';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('modelo');
        parent::addAttribute('marca');
        parent::addAttribute('ano');
        parent::addAttribute('chassi');
        parent::addAttribute('id_tipo');
        parent::addAttribute('id_equipamento');
        parent::addAttribute('id_cliente');
        parent::addAttribute('placa');

    
    
    }
}

