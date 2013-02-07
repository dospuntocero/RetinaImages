<?php

class ResponsiveImage extends DataExtension {

  public static function is_retina() {
    if (Cookie::get('isRetina') >= 2) {
      return true;
    }
  }

  protected function generateResponsive($func, $gd, $width = null, $height = null) {
    $w = self::is_retina() ? $width*2 : $width;
    $h = self::is_retina() ? $height*2 : $height;
    if($width && $height) {
      return $gd->$func($w, $h);  
    }
    elseif($width) {
      return $gd->$func($w);
    }
    return $gd->$func($h);
  }

  public function generateCroppedImageResponsive($gd, $width, $height) {
    return $this->generateResponsive("CroppedImage", $gd, $w, $h);
  }

  public function generateSetRatioSizeResponsive(GD $gd, $width, $height) {
    return $this->generateResponsive("resizeRatio", $gd, $w, $h);
	}

	public function generateSetHeight(GD $gd, $height){
    return $this->generateResponsive("resizeByHeight", $gd, null, $height);
	}

	public function generateSetSize(GD $gd, $width, $height) {
    return $this->generateResponsive("paddedResize", $gd, $w, $h);		
	}

	public function generatePaddedImage(GD $gd, $width, $height) {
    return $this->generateResponsive("paddedResize", $gd, $w, $h);
	}
}

class RetinaImage_Extension extends DataExtension {
  
  public function getIsRetina(){
      return ResponsiveImage::is_retina();
  }

  public function getRetina(){
    return Cookie::get('isRetina') >= 2 ? "@2x" : "";
  }

  public function contentcontrollerInit($controller) {
    Requirements::javascript(THIRDPARTY_DIR."/jquery/jquery.min.js");
    Requirements::javascript(THIRDPARTY_DIR."/jquery-cookie/jquery.cookie.js");
    Requirements::javascript("RetinaImages/js/retina.js");
  }
}