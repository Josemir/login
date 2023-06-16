<?php

/**
 * Crud Model Example
 */
class Crud extends CI_Model
{
	/**
	 * Insere um registro na tabela especificada.
	 *
	 * @param string $table - Nome da tabela
	 * @param array $data - Dados a serem inseridos
	 * @return bool - Retorna true em caso de sucesso ou false em caso de falha
	 */

	public function insert($table, $data)
	{
		$result = $this->db->insert($table, $data);
		return $result;
	}
	/**
	 * Atualiza um registro na tabela especificada com base no ID fornecido.
	 *
	 * @param string $table - Nome da tabela
	 * @param array $data - Dados a serem atualizados
	 * @param int $id - ID do registro a ser atualizado
	 * @return bool - Retorna true em caso de sucesso ou false em caso de falha
	 */

	public function update($table, $data, $id)
	{
		$result = $this->db->where('id', $id)->update($table, $data);
		return $result;
	}
	/**
	 * Exclui um registro da tabela especificada com base no ID fornecido.
	 *
	 * @param string $table - Nome da tabela
	 * @param int $id - ID do registro a ser excluído
	 * @return bool - Retorna true em caso de sucesso ou false em caso de falha
	 */
	public function delete($table, $id)
	{
		$result = $this->db->delete($table, ['id' => $id]);
		return $result;
	}
	/**
	 * Retorna todos os registros da tabela especificada.
	 *
	 * @param string $table - Nome da tabela
	 * @return array - Retorna um array com os registros encontrados
	 */
	public function get_records($table)
	{
		$result = $this->db->get($table)->result();
		return $result;
	}
	
	/**
	 * Retorna um registro da tabela especificada com base no ID fornecido.
	 *
	 * @param string $table - Nome da tabela
	 * @param int $id - ID do registro a ser encontrado
	 * @return object - Retorna o objeto do registro encontrado ou null se não for encontrado
	 */
	public function find_record_by_id($table, $id)
	{
		$result = $this->db->get_where($table, ['id' => $id])->row();
		return $result;
	}
}