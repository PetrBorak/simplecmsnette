<?php
namespace adminModule;

class CategoriesModel extends \BaseModel {
				public function getAll(){
								return $this->db->table('categories')->order('rank');
				}
				public function removeUser($data){
								foreach($this->langs as $lang){
												
								}
				}
				
				public function addCategory($title){
								foreach($this->langs as $lang){
												$table = $lang == 'cs' ? 'categories' : $lang.'_categories';
												$lastRank = $this->db->query('select rank from '.$table.' order by rank DESC limit 1')->fetch();
												

												$lastRank = (int)$lastRank['rank']; 
												$lastRank++;
												$nameofcategory = $lang.'-nameofcategory';
												
												$this->db->query('insert into '.$table,array('title'=>$title[$nameofcategory], 'rank'=>$lastRank));							
							};
						}
				
				public function changeRank($data){
								$counter = 0;
								foreach ($data['item'] as $item){
												$this->db->table('categories')->where('id',$item)->update(array('rank'=>$counter++));
								}
				}
}
