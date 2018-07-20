 <?php
class Equipamento extends TRecord
{
    const TABLENAME = 'equipamento';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('modelo');
     
    }
    
    
}
