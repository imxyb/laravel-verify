<?php namespace Xyb\Verify;

class Checkcode {

    private $width;
    private $height;
    private $img;
    private $codeLen;
    private $codes = 'abcdefghijkmnpqrstuvwxyz23456789';
    private $text;

    public function __construct($width = 85, $height = 30, $codeLen=4)
    {
        $this->width = $width;
        $this->height = $height;
        $this->codeLen = $codeLen;
    }

    private function _createBg()
    {
        $this->img = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($this->img, 0, 0, 0);
        imagefill($this->img, 0, 0, $color);
    }

    private function _createCode()
    {
        for($i=0;$i<$this->codeLen;$i++)
        {
            $this->text .= $this->codes[mt_rand(0, strlen($this->codes)-1)];
        }

        \Session::set('code', $this->text);

        for($i=0;$i<$this->codeLen;$i++)
        {
            $color = imagecolorallocate($this->img, mt_rand(200, 255) ,mt_rand(200, 255), mt_rand(209, 255));
            imagestring($this->img, 3, ($this->width/$this->codeLen)*($i+1)-20, 7, $this->text[$i], $color);
        }
    }

    public function output()
    {
        $this->_createBg();
        $this->_createCode();
        header('Content-type:image/png');
        imagepng($this->img);
        imagedestroy($this->img);
    }

}