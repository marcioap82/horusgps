<?php
class CadastroDeCliente extends TPage
{
    public function __construct()
    {
        parent::__construct();
       parent::__construct();
        
        // criação da classe
        $this->form = new TQuickForm;
        $this->form->style='width:800px';
        $this->form->class = 'tform';
        $this->form->setFormTitle('Cadastro de Clientes - Dados Pessoais');
        
        // criação dos campos de entrada
        $id          = new TEntry('id');
        $id->setEditable(FALSE);
        $nome = new TEntry('nome');
        $cpf   = new TEntry('cpf');
        $rg     = new TEntry('Rg');
        $contato = new TEntry('contato');
        
         $this->form->addQuickField('Id:',    $id,    40);
         $this->form->addQuickField('Nome:',    $nome,    350);
         $this->form->addQuickField('CPF:',    $cpf,    180);
         $this->form->addQuickField('RG:',    $rg,    100);
          $this->form->addQuickField('Contato:',    $contato,    150);
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $label =  new TLabel('Dados de Endereço');
        $id_endereco = new TEntry('id_endereco');
        $id_endereco->setEditable(false);
        $logradouro = new TEntry('logradouro');
        $bairro = new TEntry('bairro');
        $numero = new TEntry('numero');
        
         $this->form->addQuickField('Id_Endereco:',    $id_endereco,    40);
         $this->form->addQuickField('Logradouro:',    $logradouro,    350);
         $this->form->addQuickField('Bairro:',    $bairro,    180);
          $this->form->addQuickField('Numero:',    $numero,    180);
        $label->setFontColor('#f5f5f5');
        $cell = $row->addCell($label);
        $cell->colspan = 2;
        $cell->style = 'height:30px; border-top: 1px solid #3c8dbc; background-color:#3c8dbc; margin-top: 5px;';
          $this->form->addQuickAction('Salvar', new TAction(array($this, 'onSend')), 'fa:check-circle-o green');
                    $this->form->addQuickAction('Limpar', new TAction(array($this, 'onClear')), 'fa:check-circle-o green');
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
      
    }
    
    public function onSend($param){
         $dados = $this->form->getData();
      
       try{  
        TTransaction::open('horus');
     
       $cliente = new Cliente();
       $cliente->nome = $dados->nome;
       $cliente->cpf = $dados->cpf;
       $cliente->Rg = $dados->Rg;
       $endereco = new Endereco();
       $endereco->logradouro = $dados->logradouro;
       $endereco->numero = $dados->numero;
       $endereco->bairro = $dados->bairro;
       $endereco->store();
       $cliente->endereco = $endereco;
       $cliente->store();
       $this->form->setData($dados);
       new TMessage('info', "dados armazenados com sucesso!");

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
}















