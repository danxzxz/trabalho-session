<?php

class Tarefas {
    private $tarefa;
    private $data;

    public function __construct($tarefa, $data) {
        $this->tarefa = $tarefa;
        $this->data = $data;
    }

    /**
     * Get the value of tarefa
     */
    public function getTarefa() {
        return $this->tarefa;
    }

    /**
     * Set the value of tarefa
     */
    public function setTarefa($tarefa): self {
        $this->tarefa = $tarefa;
        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Set the value of data
     */
    public function setData($data): self {
        $this->data = $data;
        return $this;
    }

}