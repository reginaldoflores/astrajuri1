<?php

class Celke extends Model{
    
    public function getTodosEventos() {
        $argc = array();
        $sql = $this->db->query("SELECT id, title, color, start, end FROM events");
        
        if ($sql->rowCount() > 0) {
            $argc = $sql->fetchAll();
        }
        return $argc;
    }
    
}
