<?php
/**
 * SystemProgramList
 *
 * @version    1.0
 * @package    control
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class Gerencia extends TStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $formgrid;
    protected $deleteButton;
    protected $transformCallback;
    
    /**
     * Page constructor
     */
    public function __construct()
    {
        parent::__construct();
        parent::setDatabase('horus');            // defines the database
        parent::setActiveRecord('Cliente');   // defines the active record
        parent::setDefaultOrder('id', 'asc'); 
      // filterField, operator, formField
        parent::addFilterField('nome', 'like', 'nome');

        $this->form = new BootstrapFormBuilder('Gerencia_de_Cliente');
        $this->form->setFormTitle('Gerencia de Cliente');
        $name = new TEntry('nome');


        $this->form->addFields( [new TLabel('Name')], [$name]);
       
        $name->setSize('70%');

      $this->form->setData( TSession::getValue('Cliente_filter_data') ); 
         $btn = $this->form->addAction(_t('Find'), new TAction(array($this, 'onSearch')), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';

    
         $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->datatable = 'true';
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(320);

         $column_id = new TDataGridColumn('id', 'Id', 'left', 10);
         $column_name = new TDataGridColumn('nome', 'Name', 'left', 200);
         $column_cpf = new TDataGridColumn('cpf', 'CPF', 'center', 100);
         $column_rg= new TDataGridColumn('Rg', 'RG', 'center', 100);

         $this->datagrid->addColumn($column_id);
         $this->datagrid->addColumn($column_name);
         $this->datagrid->addColumn($column_cpf);
         $this->datagrid->addColumn($column_rg);

         

        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());

         // create EDIT action
        $action_edit = new TDataGridAction(array('CadastroDeVeicula', 'novoVeiculo'));
        $action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel('Adicionar Veiculo');
        $action_edit->setImage('fa:fas fa-car  #4caf50');        
        $action_edit->setField('id');
        $this->datagrid->addAction($action_edit);

        $panel = new TPanelGroup;
        $panel->add($this->datagrid);
        $panel->addFooter($this->pageNavigation);
        $this->datagrid->createModel();
        $container = new TVBox;
        $container->style = 'width: 90%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        
        parent::add($container);
       
    }  
} 