<?php

class Produtos_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	function cadastraProduto($produto, $preco, $qtde)
	{
		$data = array(
			'name_produto' => $produto,
			'preco_produto'=> $preco,
			'qtde' 		   => $qtde,
			'ativo'		   => 's'
			);

		return $this->db->insert('tb_produtos', $data);
	}

	function getProdutos()
	{	

		return $this->db->get('tb_produtos')->result();
	}

	// funçao q sera usada pela view estoque
	function getProdutosAtivo()
	{	

				$this->db->where("ativo", "s");
		return $this->db->get("tb_produtos")->result();
	}

	function getProduto($id){

		$this->db->where('id_produto', $id);
		return $this->db->get('tb_produtos')->row();
	}

	function editProduto($id, $produto, $preco, $qtde)
	{
		$this->db->where('id_produto', $id);
		
		$data = array(
			'name_produto' => $produto,
			'preco_produto'=> $preco,
			'qtde'         => $qtde
			);

		return $this->db->update('tb_produtos', $data);
	}

	function ativarProduto($id)
	{

		return $this->db->query("UPDATE tb_produtos set ativo = 's' where id_produto = '$id' ");
	}

	function desativarProduto($id)
	{
		
		return $this->db->query("UPDATE tb_produtos set ativo = 'n' where id_produto = '$id'");	
	}
}