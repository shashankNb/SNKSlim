<?php

class Params {

    public $queryString;
    public $elementType;
    public $html_attributes;
    public $icon;
    public $label;
    public $showLabel;

    /**
     * @param $queryString
     * @param $elementType
     * @param $html_attributes
     * @param $icon
     * @param $label
     * @param bool $showLabel
     */
    public function __construct($queryString = NULL, $elementType = NULL, $html_attributes = NULL, $icon = NULL, $label = NULL, $showLabel = false)
    {
        $this->queryString = $queryString;
        $this->elementType = $elementType;
        $this->html_attributes = $html_attributes;
        $this->icon = $icon;
        $this->label = $label;
        $this->showLabel = $showLabel;
    }
}
