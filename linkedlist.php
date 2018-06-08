<?php

class Node{

  private $next;
  private $data;

  /**
   * @return null
   */
  public function getNext() {
    return $this->next;
  }

  /**
   * @param null $next
   */
  public function setNext($next) {
    $this->next = $next;
  }

  /**
   * @return mixed
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param mixed $data
   */
  public function setData($data) {
    $this->data = $data;
  }


  public function __construct($data){
       $this->next = null;
       $this->data = $data;

  }
}

class LinkedList{

  private $head;
  private $counter;

  public function add($data){

    if($this->head == null){
      $this->head = new Node($data);
    }
    $temp = new Node($data);
    $current  = $this->head;
    if($current != null){
      while($current->getNext() != null){
        $current = $current->getNext();
      }
      $current->setNext($temp);
    }
    $this->incrementCounter();
  }

  public function incrementCounter(){
    $this->counter++;
  }
  public function decrementCount(){
    $this->counter--;
  }

  public function getCount(){
    return $this->counter;
  }

  public function get($index){

    if($index < 0){
      return null;
    }
    $current = null;
    if($this->head != null){
      $current = $this->head->getNext();

      for($i = 0; $i < $index; $i++){
        if($current->getNext() == null)
           return null;
        $current = $current->getNext();
      }
      return $current->getData();
    }
    return $current;
  }

  public function remove($index){


    if($index < 0  && $this->getCount() < 0)
      return FALSE;


    $current = $this->head;

    if($current != null){
      for($i = 0; $i < $index; $i++ ){
         if($current->getNext() == null)
           return FALSE;
           $current = $current->getNext();
      }
        $current->setNext($current->getNext()->getNext());
       $this->decrementCount();
      return TRUE;

    }
    return FALSE;

  }
}


$list = new LinkedList();

for($p = 0 ; $p < 10; $p++){
$list->add($p);
}


$list->remove(2);


for($j = 0 ; $j < $list->getCount(); $j++){
  echo $list->get($j) . "</br>";

}



?>
