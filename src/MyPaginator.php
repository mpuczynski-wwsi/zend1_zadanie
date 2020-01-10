<?php
namespace Test;

class Test_MyPaginator extends \Zend_Paginator {

    public function __construct(){
        $this->infinityMode = false;
    }

    public function setInfiniteMode($val){
        $this->infinityMode = $val;
    }    
    
    public function getIterator()
    {
        if ($this->infinityMode){

        } else {
            return $this->getCurrentItems();
        }
    }
}