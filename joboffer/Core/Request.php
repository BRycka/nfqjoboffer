<?php

namespace joboffer\Core;

class Request
{
    /**
     * @var SimpleXMLElement
     */
    private $xml;
    private $params=array();
    public function __construct($string)
    {
        $this->xml = simplexml_load_string($string);
        foreach ($this->xml->params->children() as $param) {
            /** @var SimpleXMLElement $param */
            $this->params[$param->getName()] = (string)$param;
        }
    }

    public function getAction()
    {
         return (string) $this->xml->action;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getParam($name)
    {
        if (isset($this->params[$name])) {
            return $this->params[$name];
        } else {
            return null;
        }
    }

    public function getFormat()
    {
        $format = explode(';', $_SERVER['CONTENT_TYPE']);
        $format = explode('/', $format[0]);
        return $format[1];
    }
}
