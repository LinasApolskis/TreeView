<?php

class tree {
    
    private $tree_table = '';
	
	public function __construct() {
        $this->tree_table = config::DB_PREFIX . 'entry';
	}
	
	/**
	 * @param type $id
	 * @return type
	 */
	public function getTree($id) {
		$query = "  SELECT *
					FROM `{$this->tree_table}`
					WHERE `id`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * @return type
	 */
	public function getTreeList() {
		$query = "  SELECT `{$this->tree_table}`.`id`,
						   `{$this->tree_table}`.`name`,
						   `{$this->tree_table}`.`parent_id`
					FROM `{$this->tree_table}`";
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * @return type
	 */
	public function getIesmaiListCount() {
		$query = "  SELECT COUNT(`{$this->iesmu_lentele}`.`id_Iesmas`) as `kiekis`
					FROM `{$this->iesmu_lentele}`
						LEFT JOIN `{$this->keliu_lentele}`
							ON `{$this->iesmu_lentele}`.`fk_Keliasid_Kelias`=`{$this->keliu_lentele}`.`id_Kelias`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Modelio atnaujinimas
	 * @param type $data
	 */
	public function updateTree($data) {
		$query = "  UPDATE `{$this->tree_table}`
					SET    `id`='{$data['id']}',
					       `name`='{$data['name']}',
					       `parent_id`='{$data['parent_id']}'
					WHERE `id`='{$data['id']}'";
		mysql::query($query);
	}
	
	/**
	 * Modelio įrašymas
	 * @param type $data
	 */
	public function insertTree($data) {
		$query = "  INSERT INTO `{$this->tree_table}`
								(
									`id`,
									`name`,
									`parent_id`
								)
								VALUES
								(
									'{$data['id']}',
									'{$data['name']}',
									'{$data['parent_id']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * @param type $id
	 */
	public function deleteTree($id) {
		$query = "  DELETE FROM `{$this->tree_table}`
					WHERE `id`='{$id}'";
		mysql::query($query);
	}

}