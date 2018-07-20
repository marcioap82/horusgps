<?php
class CadastroDeVeicula extends TWindow
{

	private $form;
public	function __construct()
	{
		parent::__construct();
		parent::setTitle('Cadatro de Veiculo');
		parent::setSize(900, 500);

		//cria o formulario

		$this->form = new TQuickForm;

		$notbook = new TNotebook(530, 260);
		$notbook->appendPage('Cadastro de Veiculo', $this->form);

		$id = new TEntry('id');
		$tipo =  new TDBCombo('id_tipo', 'horus', 'Tipo', 'id', 'tipo' );
		$id->setEditable(false);
		$modelo = new TEntry('modelo');
		$placa = new TEntry('placa');
		$marca= new TEntry('marca');
		$ano = new TEntry('ano');
		$chassi= new TEntry('chassi');
		$rastreador =  new TDBCombo('id_equipamento', 'horus', 'Equipamento', 'id', 'modelo' );

		$this->form->addQuickField('Id: ', $id, 40);
		$this->form->addQuickField('Tipo: ', $tipo, 100);
		$this->form->addQuickField('Modelo: ', $modelo, 250);
	    $this->form->addQuickField('Placa: ', $placa, 100);
		$this->form->addQuickField('Marca: ', $marca, 250);
		$this->form->addQuickField('Ano: ', $ano, 100);
		$this->form->addQuickField('Chassi: ', $chassi, 200);
		$this->form->addQuickField('Rastreador: ', $rastreador, 100);

		$this->form->addQuickAction('Salvar', new TAction(array($this , 'onSalvar')), 'fa:fas fa-save #3c8dbc');
				$this->form->addQuickAction('Limpar', new TAction(array($this , 'onLimpar')), 'fa:fal fa-pencil-alt #3c8dbc');

    parent::add($notbook);
	}

	public  function novoVeiculo($param)
	{
		 TSession::setValue('cliente', $param);
	
    }

	public function onSalvar($param){

      
       $id_cliente = TSession::getValue('cliente');
           $dados = $this->form->getData();


        TTransaction::open('horus');	
       
        $veiculo = new Veiculo();
        $veiculo->modelo = $dados->modelo;
        $veiculo->id_tipo = $dados->id_tipo;
        $veiculo->placa= $dados->placa;
        $veiculo->marca = $dados->marca;
        $veiculo->ano = $dados->ano;
        $veiculo->chassi = $dados->chassi;
        $veiculo->id_equipamento = $dados->id_equipamento;
        $veiculo->id_cliente = $id_cliente['id'] ;
        $veiculo->store();
        new TMessage('info', 'Dados Armazenados com sucesso');
         $this->form->setData($veiculo);
        TTransaction::close();
        $this->form->setData($dados);
        

	}
	public function onLimpar()
	{
		$this->form->setData('');
	}

	
}