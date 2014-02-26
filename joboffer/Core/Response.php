<?php

namespace joboffer\Core;

class Response
{
    /**
     * @var string
     */
    private $content = '';

    /**
     * @var string
     */
    private $mimeType = 'text/html';

    /**
     * @var int
     */
    private $responseCode = 200;

    /**
     * @param null $content
     * @param null $mimeType
     */
    public function __construct($content = null, $mimeType = null)
    {
        if (null != $content) {
            $this->setContent($content);
        }

        if (null != $mimeType) {
            $this->setMimeType($mimeType);
        }
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        header("Content-type: {$this->getMimeType()}; charset=UTF-8", true, $this->getResponseCode());
        return $this->getContent();
    }

    /**
     * @param $int
     */
    public function setResponseCode($int)
    {
        $this->responseCode = $int;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }
}
