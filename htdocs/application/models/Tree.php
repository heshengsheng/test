<?php
class Tree extends CI_Model
{
    public function set_setting($check = '{enable: true,autoCheckTrigger: true}')
    {
          return $check;
    }
    public function set_nodes($nodes)
    {
        
        return $nodes;
    }
}