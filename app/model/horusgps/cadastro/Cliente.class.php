<?php
class Cliente extends TRecord
{
    const TABLENAME = 'cliente';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    private $endereco; 
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('nome');
        parent::addAttribute('cpf');
        parent::addAttribute('Rg');
        parent::addAttribute('id_endereco');
    }

    public function set_endereco(Endereco $endereco)
    {
       $this->endereco = $endereco;
       $this->id_endereco = $endereco->id;
    }

    public function get_endereco()
    {
        if(empty($this->endereco))
        {
            $this->endereco = new Endereco($this->id_endereco);
        }

        return $this->endereco;
    }
}
 