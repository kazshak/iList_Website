<script language="php">

/**
 * gauge
 *
 * @package 		TPO Projects Version 2.0
 * @author 			M.S.B. Bachus
 * @copyright 	TPO Displays Europe N.V. 2009
 * @version 		V1.0 Initial version 2009-01-22
 * @access 			public
 */
class gauge
{
  /**
   * gauge::gauge()
   *
   * Constructor sets up the Gauge
   *
   */
  function gauge()
  {
		// Set parameters
    $this->imagesize = 100;
    $this->span      = 270;
		$this->min       = 0;
		$this->max       = 100;
		$this->maj_tspan = 10;
		$this->min_tspan = 5;
		$this->maxgreen  = 25;
		$this->maxyellow = 67;
		$this->legend    = "";
		$this->pos       = 0;
    $this->majortick = true;
    $this->output    = 'gif';
  }

	/**
	 * gauge::setPos()
	 *
   * Tells the program which position the needle should show in relation to the maximum value.
   *
	 * @param float $pos
	 */
	function setPos($pos)
  {
		// Only draw up to +-0.5% of the gauge scale
    if ($pos < $this->min+($this->max*0.005))
    {
      $pos = $this->min+($this->max*0.005);
    }
		if ($pos > $this->max-($this->max*0.005))
    {
      $pos = $this->max-($this->max*0.005);
    }

		$this->pos = $pos;
	}

	/**
	 * gauge::setLegend()
   *
   * This places a text under the needle.
	 *
	 * @param String $legend
	 */
	function setLegend($legend)
  {
		$this->legend = $legend;
	}

	/**
	 * gauge::setOutput()
	 *
   * Tells what output is generated, you have the choise between:
   *  1. Gif    $output = 'gif'
   *  2. Jpg    $output = 'jpg'
   *  3. Png    $output = 'png'
   *
	 * @param String $output
	 */
	function setOutput($output)
  {
		$this->output = strtolower($output);
	}

	/**
	 * gauge::setGreen()
   *
   * Set the maximum value for the Green part of the scale.
	 *
	 * @param Integer $green
	 */
	function setGreen($green)
  {
		$this->maxgreen = $green;
	}

	/**
	 * gauge::setYellow()
   *
   * Set the maximum value for the Yellow part of the scale.
	 *
	 * @param Integer $yellow
	 */
	function setYellow($yellow)
  {
		$this->maxyellow = $yellow;
	}

	/**
	 * gauge::setMin()
	 *
   * Set the minimum value for the scale.
   *
	 * @param Integer $min
	 */
	function setMin($min)
  {
		$this->min = $min;
	}

	/**
	 * gauge::setMax()
	 *
   * Set the maxiimum value for the scale.
	 *
	 * @param Integer $max
	 */
	function setMax($max)
  {
		$this->max = $max;
	}

  /**
   * gauge::setSpan()
	 *
   * Set the angle over which the scale is rotated.
   *
   * @param Integer $span
   */
  function setSpan($span)
  {
    $this->span = $span;
  }

  /**
   * gauge::setImagesize()
	 *
   * Set the image size for the output. As the Gauge is square only one size is required.
   *
   * @param Integer $size
   */
  function setImagesize($size)
  {
    $this->imagesize = $size;
  }

	/**
	 * gauge::plot()
   *
   * Start the output and draw the gauge.
	 *
	 * @return Graphical output (gif, jpg or png)
	 */
	function plot()
  {
    if ( $this->max - $this->min > 50 )
    {
      $this->minortick = true;
    }
    else
    {
      $this->minortick = false;
    }

    if ($this->maxyellow <= $this->max)
    {
   		$this->maxred = $this->max;
    }
		$this->center    = $this->imagesize/2;
    $this->offset    = ( 360 - $this->span )/2;
    $this->startarc  = 90+$this->offset;
    $this->endarc    = 90-$this->offset;

		// Prepare image
    error_log("Size = ".$this->imagesize);
		$this->img    = imagecreate($this->imagesize, $this->imagesize);
    $this->white  = imagecolorallocate($this->img, 255, 255, 255);
    $this->black  = imagecolorallocate($this->img, 0, 0, 0);
    $this->silver = imagecolorallocate($this->img, 0xD0, 0xD0, 0xD0);
    $this->red    = imagecolorallocate($this->img, 255, 0, 0);
    $this->yellow = imagecolorallocate($this->img, 255, 165, 0);
    $this->green  = imagecolorallocate($this->img, 0, 120, 0);
    $this->grey1  = imagecolorallocate($this->img, 0x40, 0x40, 0x40);
    $this->grey2  = imagecolorallocate($this->img, 0x60, 0x60, 0x60);
    $this->grey3  = imagecolorallocate($this->img, 0x80, 0x80, 0x80);
    $this->grey4  = imagecolorallocate($this->img, 0xA0, 0xA0, 0xA0);
    $this->grey5  = imagecolorallocate($this->img, 0xC0, 0xC0, 0xC0);

		// Start Drawing Gauge
    imagefilledarc($this->img,
									 $this->center,
									 $this->center,
									 $this->imagesize*0.99,
									 $this->imagesize*0.99,
									 0,
									 360,
									 $this->grey1,
									 IMG_ARC_PIE );
    imagefilledarc($this->img,
									 $this->center,
									 $this->center,
									 $this->imagesize*0.985,
									 $this->imagesize*0.985,
									 0,
									 360,
									 $this->grey2,
									 IMG_ARC_PIE );
    imagefilledarc($this->img,
		               $this->center,
									 $this->center,
									 $this->imagesize*0.975,
									 $this->imagesize*0.975,
									 0,
									 360,
									 $this->grey3,
									 IMG_ARC_PIE );
    imagefilledarc($this->img,
		               $this->center,
									 $this->center,
									 $this->imagesize*0.96,
									 $this->imagesize*0.96,
									 0,
									 360,
									 $this->grey4,
									 IMG_ARC_PIE );
    imagefilledarc($this->img,
		               $this->center,
									 $this->center,
									 $this->imagesize*0.94,
									 $this->imagesize*0.94,
									 0,
									 360,
									 $this->grey5,
									 IMG_ARC_PIE );
    imagefilledarc($this->img,
		               $this->center,
									 $this->center,
									 $this->imagesize*0.915,
									 $this->imagesize*0.915,
									 0,
									 360,
									 $this->white,
									 IMG_ARC_PIE );

    // Draw Green Arc
    if ($this->maxgreen > $this->min)
    {
      if ($this->maxgreen > $this->max)
      {
        $this->maxgreen = $this->max;
      }
      $this->startgreen = $this->startarc;
      $this->endgreen   = $this->startarc + floor( $this->span * ($this->maxgreen/$this->max));
      imagefilledarc($this->img,
			               $this->center,
										 $this->center,
										 0.9*$this->imagesize,
										 0.9*$this->imagesize,
										 $this->startgreen,
										 $this->endgreen,
										 $this->green,
										 IMG_ARC_PIE );
    }
    else
    {
      // No green in this gauge.
      $this->maxgreen = $this->min;
    }

    // Draw Yellow Arc
    if ($this->maxyellow > $this->maxgreen)
    {
      if ($this->maxyellow > $this->max)
      {
        $this->maxyellow = $this->max;
      }
      $this->startyellow = $this->endgreen;
      $this->endyellow   = $this->startarc + floor( $this->span * ($this->maxyellow/$this->max));
      imagefilledarc($this->img,
										 $this->center,
										 $this->center,
										 0.9*$this->imagesize,
										 0.9*$this->imagesize,
										 $this->startyellow,
										 $this->endyellow,
										 $this->yellow,
										 IMG_ARC_PIE );
    }
    else
    {
      // No yellow in this
      $this->maxyellow = $this->maxgreen;
    }

    // Draw red Arc
    if ($this->maxred > $this->maxyellow)
    {
      if ($this->maxred > $this->max)
      {
        $this->maxred = $this->max;
      }
      $this->startred = $this->endyellow;
      $this->endred   = $this->startarc + floor( $this->span * ($this->maxred/$this->max));
      imagefilledarc($this->img,
										 $this->center,
										 $this->center,
										 0.9*$this->imagesize,
										 0.9*$this->imagesize,
										 $this->startred,
										 $this->endred,
										 $this->red,
										 IMG_ARC_PIE );
    }
    else
    {
      // No red in this
      $this->maxred = $this->maxyellow;
    }
    imagefilledarc($this->img,
									 $this->center,
									 $this->center,
									 0.6*$this->imagesize,
									 0.6*$this->imagesize,
									 0,
									 360,
									 $this->white,
									 IMG_ARC_PIE );

    // Set scale
    imagearc($this->img,
		         $this->center,
						 $this->center,
						 0.75*$this->imagesize,
						 0.75*$this->imagesize,
						 $this->startarc,
						 $this->endarc,
						 $this->black);
    // set minor tickmarks
    if ( $this->minortick )
    {
      for ($i=$this->min; $i<=$this->max; $i+=$this->min_tspan)
      {
        $this->addtickmark("MINOR", $i);
      }
    }
    // set major tickmarks
    if ( $this->majortick )
    {
      for ($i=$this->min; $i<=$this->max; $i+=$this->maj_tspan)
      {
        $this->addtickmark("MAJOR", $i);
      }
    }

    // draw needle
    $long    = 0.95*$this->center;
    $width   = 0.06*$this->center;
    $width2  = 0.2*$this->center;
    $degrees = $this->startarc + floor($this->pos*$this->span/$this->max);
    $triangle = array($this->center,
                      $this->center,
                      $this->center+$width*cos(deg2rad($degrees+90)),
                      $this->center+$width*sin(deg2rad($degrees+90)),
                      $this->center+$long*cos(deg2rad($degrees)),
                      $this->center+$long*sin(deg2rad($degrees)));
    imagefilledpolygon($this->img, $triangle, 3, $this->black);

    $triangle = array($this->center,
                      $this->center,
                      $this->center+$width*cos(deg2rad($degrees-90)),
                      $this->center+$width*sin(deg2rad($degrees-90)),
                      $this->center+$long*cos(deg2rad($degrees)),
                      $this->center+$long*sin(deg2rad($degrees)));
    imagefilledpolygon($this->img, $triangle, 3, $this->silver);

    $triangle = array($this->center,
                      $this->center,
                      $this->center+$width*cos(deg2rad($degrees-90)),
                      $this->center+$width*sin(deg2rad($degrees-90)),
                      $this->center+$width2*cos(deg2rad($degrees-180)),
                      $this->center+$width2*sin(deg2rad($degrees-180)));
    imagefilledpolygon($this->img, $triangle, 3, $this->black);

    $triangle = array($this->center,
                      $this->center,
                      $this->center+$width*cos(deg2rad($degrees+90)),
                      $this->center+$width*sin(deg2rad($degrees+90)),
                      $this->center+$width2*cos(deg2rad($degrees-180)),
                      $this->center+$width2*sin(deg2rad($degrees-180)));
    imagefilledpolygon($this->img, $triangle, 3, $this->silver);

    imagefilledarc($this->img,
									 $this->center,
									 $this->center,
									 0.1*$this->center,
									 0.1*$this->center,
									 0,
									 360,
									 $this->black,
									 IMG_ARC_PIE );

		//Wait for plot to avoid drawing more than one legend or hand

    imagestring($this->img,
								$this->fontsize(),
								$this->center+1-strlen($this->legend)*(3+$this->fontsize())/2,
								0.58*$this->imagesize,
								$this->legend,
								$this->black);
								
		// writing to screen
		switch ($this->output)
		{
			case "gif":
		 		header("Content-type: image/gif");
				imagegif($this->img);
				break;

			case "jpg":
		 		header("Content-type: image/jpg");
				imagejpg($this->img);
				break;

			case "png":
		 		header("Content-type: image/png");
				imagepng($this->img);
				break;
		}
		imagedestroy($this->img);
	}

	/**
	 * gauge::addtickmark()
	 *
	 * Adds the tickmarks in the scale.
	 *
	 * @param mixed $type
	 * @param mixed $value
	 */
	function addtickmark($type, $value)
  {
		// Draw black divisions
    $degrees = $this->startarc + floor($value*$this->span/$this->max);
    switch ($type)
    {
      case "MAJOR":
        $y  = 0.85*$this->center*sin(deg2rad($degrees));
        $x  = 0.85*$this->center*cos(deg2rad($degrees));
        $y2 = 0.65*$this->center*sin(deg2rad($degrees));
        $x2 = 0.65*$this->center*cos(deg2rad($degrees));
        break;

      case "MINOR":
        $y  = 0.80*$this->center*sin(deg2rad($degrees));
        $x  = 0.80*$this->center*cos(deg2rad($degrees));
        $y2 = 0.70*$this->center*sin(deg2rad($degrees));
        $x2 = 0.70*$this->center*cos(deg2rad($degrees));
        break;
    }
    imageline ($this->img, $this->center+$x2, $this->center+$y2, $this->center+$x, $this->center+$y, $this->black);
	}

	/**
	 * gauge::fontsize()
	 *
   * Determine the fontsize which is depending of the image size.
   *
	 */
	function fontsize()
  {
		switch(true)
		{
			case $this->imagesize <= 150:
				$fontsize = 1;
				break;

			case $this->imagesize <= 200:
				$fontsize = 2;
				break;

			case $this->imagesize <= 300:
				$fontsize = 3;
				break;

			case $this->imagesize <= 400:
				$fontsize = 4;
				break;

			default:
				$fontsize = 5;
				break;
		}

		return $fontsize;
  }

}

$pos = $_GET['pos']
$size   = 175;
$text   = "FILE";
$green  = 33;
$yellow = 67;
$min    = 0;
$max    = 100;
$span   = 260;

$gauge = new gauge();
$gauge->setOutput('jpg');
$gauge->setPos($pos);
$gauge->setImagesize($size);
$gauge->setLegend($text);
$gauge->setGreen($green);
$gauge->setYellow($yellow);
$gauge->setMax($max);
$gauge->setMin($min);
$gauge->setSpan($span);
$gauge->plot(); 

</script>
