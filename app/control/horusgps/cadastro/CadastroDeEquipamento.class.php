<?php
class CadastroDeEquipamento extends TPage
{

   private $datagrid;

    public function __construct()
    {
        parent::__construct();

         $this->datagrid = new TQuickGrid;
         $this->datagrid->style="width:100%";
         $this->datagrid->addQuickColumn('Id',    'id',    'left', '8%');
          $this->datagrid->addQuickColumn('Modelo',    'modelo',    'center', '80%');

          $this->datagrid->addQuickAction('Delete', new TDataGridAction(array($this, 'onDelete')), 'id', 'fa:trash red');

        
        // criação da classe
        $this->form = new TQuickForm;
        $this->form->style='width:800px';
        $this->form->class = 'tform';
        $this->form->setFormTitle('Cadastro de  Equipamento');
        
        // criação dos campos de entrada
        $id          = new TEntry('id');
        $id->setEditable(FALSE);
        $modelo = new TEntry('modelo');
       
        
         $this->form->addQuickField('Id:',    $id,    40);
         $this->form->addQuickField('Modelo:',    $modelo,    350);     
        
     
          $this->form->addQuickAction('Salvar', new TAction(array($this, 'onSend')), 'fa:check-circle-o green');
                    $this->form->addQuickAction('Limpar', new TAction(array($this, 'onClear')), 'fa:check-circle-o green');

       $this->datagrid->createModel();

       $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());

        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        $vbox->add($this->datagrid);
        $vbox->add($this->pageNavigation);

        parent::add($vbox);
      
    }
    
    public function onSend($param){

      
       try{  
        TTransaction::open('horus');
     
       $equipamento= $this->form->getData('Equipamento');
       $equipamento->store();
       
       $this->form->setData($equipamento);
       new TMessage('info', "dados armazenados com sucesso!");
          $this->onReload();
      

        TTransaction::close();
       }catch(Exception  $e)
       {
         new TMessage('error', $e->getMessage());
       }
      
    
     }
     public function onClear()
     {
        $this->form->setData('');
     }

public function onReload()
     {
        $this->datagrid->clear();
         TTransaction::open('horus');
          $repositori= new TRepository('Equipamento');
          $obejetos= $repositori->load();
      foreach ($obejetos as $obejeto) {
       
         $this->datagrid->addItem($obejeto);
      }
        
        
          TTransaction::close();


      }
     public function onDelete($param)
     {

     }
    public  function show()
    {
        $this->onReload();
        parent::show();
    }
}