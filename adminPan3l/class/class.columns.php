<?php

class Column {

    public $name;
    public $label;
    public $shortLabel;
    public $type;
    public $param;

    /**
     * @param $name
     * @param $label
     * @param $shortLabel
     * @param null $type
     * @param $param
     */
    public function __construct($name, $label, $shortLabel, $type = NULL, $param = NULL)
    {
        $this->name = $name;
        $this->label = $label;
        $this->shortLabel = $shortLabel;
        $this->type = $type;
        $this->param = $param;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getShortLabel()
    {
        return $this->shortLabel;
    }

    /**
     * @param mixed $shortLabel
     */
    public function setShortLabel($shortLabel)
    {
        $this->shortLabel = $shortLabel;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }
}
