<?php

class Push
{
    private $title;
    private $message;
    private $image;
    private $payload;
    private $is_background;
    
    function __construct()
    {
        
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    public function setImage($image)
    {
        $this->image = $image;
    }
    
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }
    
    public function setIsBackground($is_background)
    {
        $this->is_background = $is_background;
    }
    
    public function getPush()
    {
        $res = array();
        $res['data']['title'] = $this->title;
        $res['data']['message'] = $this->message;
        $res['data']['image'] = $this->image;
        $res['data']['payload'] = $this->payload;
        $res['data']['is_background'] = $this->is_background;
        $res['data']['timestamp'] = date('Y-m-d G:i:s');
        
        return $res;
    }
    
}
