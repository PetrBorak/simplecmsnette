<?php
namespace adminModule;

class HomepagelistModel extends \BaseModel {
    public $content;
    public $ids;
    public function giveId($langs){
        $id = array();
        foreach($langs as $lang){
            $homepagetable = $lang == "cs" ? 'homepage': $lang."_homepage";
            $id[$lang] = $this->db->query('select id from '.$homepagetable)->fetch();
            $id[$lang] = $id[$lang]['id'];
        }
            $this->ids = $id;
            return $id;
    }
    
    public function getContent($langs){
        $this->content = array();
        foreach($langs as $lang){
            if($lang == 'cs'){
                $langtable = "";
            } else {
                $langtable = $lang.'_';
            }
            $this->content[$lang] = $this->db->query('select content from '.$langtable.'homepage where id =1')->fetch();
        $this->content[$lang] = $this->content[$lang]['content'];
        }

        return $this->content;
    }
    
    public function saveContent($content, $langs){
        foreach($langs as $lang){
            $contenttable = $lang == "cz" ? 'homepage': $lang."_homepage";
            $contentcolumn = "content";
            $id = $this->ids[$lang];
            $contenttosaveident = 'content'.$lang;
            $contenttosave = $content[$contenttosaveident];
            $this->db->query('update '.$contenttable.' set content = ? where id=?',$contenttosave, $id);
        }
    }
}


