<?php
class StatusEquipamento extends TRecord
{
    const TABLENAME = 'status_equipamento';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('status');
      
    }
    }
    }
}


