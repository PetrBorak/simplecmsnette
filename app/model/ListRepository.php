<?php
  namespace TODO;
  use Nette;

  class ListRepository extends Repository {
    public function tasksOf(Nette\Database\Table\ActiveRow $list){
        return $list->related('task')->order('created');
    }
    
    public function createList($title)
    {
        return $this->getTable()->insert(array(
            'title' => $title
        ));
    }
  }
  