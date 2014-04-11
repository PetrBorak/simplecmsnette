<?php
namespace adminModule;

class ReferenceModel extends \BaseModel {
    
    public function getItems($lang, $langs){
        $tablelang = $lang.'_references';
        foreach($langs as $lang){
          $table1 = $lang.'_references';
          $table2 = $lang.'_referencesimages';
          $this->db->query('create table if not exists '.$table1.' (id int not null auto_increment, content varchar(500), title varchar(500), created varchar(150), rank int, primary key (id))')->execute();   
          $this->db->query('create table if not exists '.$table2.'(id int not null auto_increment, referencekey int, title varchar(150), path varchar(300), primary key(id))')->execute();
        }
        return $this->db->query('select * from '.$tablelang.' order by rank')->fetchall();
    }
				
				public function removeReference($id, $langs){
								foreach($langs as $lang){
												$table = $this->db->table($lang.'_references');
												$table->find($id)->delete();
								}
				}
    
    public function addReference($values){
        $data = array();
        foreach($values as $key=>$item){
            if($key != 'categories'){
                $lang = substr($key, -2);
                $itemtd = substr($key, 0, -2);
                $data[$lang][$itemtd] = htmlspecialchars($item);   
            }
            $data[$lang]['categories'] = $values['categories'];
        }
        $tofr = count($this->db->query('select * from cs_references')->fetchAll()) + 1;
        
        foreach($data as $lang=>$carr){
            $table = $lang.'_references';
            $this->db->query('insert into '.$table.' (content, title, created, rank, category) values ("'.$carr['content'].'", "'.$carr['title'].'", "'.$carr['created'].'", '.$tofr.', '.$carr['categories'].')');
        }  
    }
				
    public function editReference($values, $id){
        $data = array();

        foreach($values as $key=>$item){
            if($key != 'categories' && $key != 'rank'){
                $lang = substr($key, -2);
                $itemtd = substr($key, 0, -2);
                $data[$lang][$itemtd] = htmlspecialchars($item);   
            }
            $data[$lang]['categories'] = $values['categories'];
        }
								$tofr = $values['rank'];

        foreach($data as $lang=>$carr){
            $table = $lang.'_references';
            $this->db->query('update '.$table.' set content = "'.$carr['content'].'", title = "'.$carr['title'].'", created = "'.$carr['created'].'", rank = "'.$tofr.'", category ="'. $carr['categories'].'" where id= '.$id);
        }  
								
								dump($data);
    }				
    
       public function changeRank($data, $langs){

       foreach($langs as $lang){
            $iterator = 1;
            $table = $lang.'_references';
            foreach($data['item'] as $id){
                $this->db->query('update '.$table.' set rank = '.$iterator++.' where id= '.$id)->execute();
            }
       }
   }
   
       public function changeRankImages($data, $langs){

       foreach($langs as $lang){
            $iterator = 1;
            $table = $lang.'_referencesimages';
            foreach($data['item'] as $id){
                $this->db->query('update '.$table.' set rank = '.$iterator++.' where id= '.$id)->execute();
            }
       }
   }   
   
   public function getSingle($id, $langs){
       $paths = $this->db->query('select id,path from cs_referencesimages where referencekey ='.$id.' order by rank')->fetchAll(); 
       
       foreach($paths as $path){
           $path['path'] = ROOT.$path['path'];
       }
       return $paths;
   }
   
   public function getEditData($id, $langs){
       $data = array();
       foreach($langs as $lang){
          $table = $lang.'_references';
          $data[$lang] =  $this->db->query('select * from '.$table.' where id= '.$id)->fetchAll();
       }
       return $data;
       
   }
   
   public function saveAddImage($values,$id,$langs){
       $amount = $this->db->query("select count(*) from cs_referencesimages")->fetchAll();
       $rank = $amount[0]['count(*)'] + 1;
       
       $image = $values->image;
       if($image->isOk()&&$image->getError() == 0 && $image->isImage()){
           $pathinfo = $image->getName();
           $image = $image->toImage();
           $pathtf = WWW_DIR.'/data/id-'.date('YmdHis').$pathinfo;
           $webpath = '/data/id-'.date('YmdHis').$pathinfo;
           $image->save($pathtf);
           
           foreach($langs as $lang){
            $table = $lang.'_referencesimages';
            
            $this->db->query('insert into '.$table.' (referencekey, title, path, rank) values ('.$id.', "'.$values['title'.$lang].'", "'.$webpath.'",'.$rank.')');
             
           } 
             
           
							}else{dump($image->isOk());
							dump($image->getError());
							dump($image->isImage());
							dump($image);
							}
   }
			
			public function getmodaldata($langs,$id){
							$titles = array();
							foreach($langs as $lang){
								$titles[$lang] = $this->db->query('select title from '.$lang.'_referencesimages where id='.$id)->fetchAll();
							}
							return $titles;
			}
			
			public function saveImageData($data, $langs){
							foreach($langs as $lang){
											$table = $lang.'_referencesimages';
											
											$column = $lang == 'en' ? $data['englishtitle'] : $data['czechtitle'];
											$this->db->query('update '.$table.' set title ="'.$column.'" where id = '.$data['imageid'])->execute();
											 
							}
			}
			
			public function removeImage($values, $langs, $that){
							foreach($langs as $lang){
											$table = $lang.'_referencesimages';
											$this->db->query('delete from '.$table.' where id = '.$values['imageid']);
							}
			}
}
