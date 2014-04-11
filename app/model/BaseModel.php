<?php
class BaseModel extends \Nette\Object {
    public $db;
    public $lang;
				public $langs;
    
    public function setLang($lang){
        $this->lang = $lang == 'cs' ? '' : $lang.'_';
    }
    public function __construct(\Nette\Database\Connection $database, $config){
           $this->db = $database;
											$this->langs = $config['langs'];
    }
}
