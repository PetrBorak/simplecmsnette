<?php
namespace adminModule;

class PagesModel extends \BaseModel {
    
    public function getItems($lang){
        $table = $lang == 'cs' ? 'pages' : $lang.'_pages';
        $items = $this->db->query('select title, id, rank from '.$table.' order by rank')->execute();
        return $items;
    }
    
   public function changeRank($data, $langs){

       foreach($langs as $lang){
            $iterator = 1;
            $table = $lang == 'cs' ? 'pages' : $lang.'_pages';
            foreach($data['item'] as $id){
                $this->db->query('update '.$table.' set rank = '.$iterator++.' where id= '.$id)->execute();
            }
       }
   }
   
   public function fetchEditContent($langs){
       $content = array();
       if($langs != NULL){
           foreach($langs as $key=>$lang){
           $table = $key == 'cs' ? 'pages' : $key.'_pages';
           if($lang == NULL){
               $content[$key] = array(0=>array('title'=>'','content'=>'','category'=>''));
           }else{
               $content[$key] = $this->db->query('select * from '.$table.' where id='.$lang)->fetchAll();       
           }
        }
      } 
       return $content;
   }
   
   public function fetchCategories($lang){
       $table = $lang == 'cs' ? 'categories' : $lang.'_categories';
       return $this->db->query('select * from '.$table)->fetchAll();
       
   }
   
   public function saveValuesEdit($values, $langs, $id){
       foreach($langs as $lang){
           $table = $lang == 'cs' ? 'pages':$lang.'_pages';
           $title = 'titleEditPage'.$lang;
           $content = 'contentEditPage'.$lang;
           $this->db->query('update '.$table.' set title="'.$values[$title].'", content= "'.htmlspecialchars($values[$content]).'", category="'.$values['categories'].'" where id ='.$id);
       }
   }
   
   public function createPage($langs){
       $rank = $this->db->query('select rank from pages')->fetchAll();
       sort($rank);
       $lastRank = count($rank) + 1;
       $langids = array();
       foreach($langs as $lang){
          $table = $lang == 'cs' ? 'pages' : $lang.'_pages';
          $row = $this->db->table($table)->insert(array(
          'rank'=>$lastRank
       ));
       
          $langid[$lang] = $row['id'];
      }
       return $langid;
   }
   
   public function removePage($id, $langs){
       $data = array('item'=>array());
       foreach($langs as $lang){
           $table = $lang == 'cs' ? 'pages':$lang.'_pages';
           $this->db->query('delete from '.$table.' where id='.$id);
           $datatemp = $this->db->query('select rank, id from '.$table.' order by rank')->fetchAll();
           
           $iterator = 0;
           foreach($datatemp as $key=>$arrv){
               $data['item'][$iterator++] = $arrv['id'];
           };
           
           $this->changeRank($data,$langs);
       }
   }

}
