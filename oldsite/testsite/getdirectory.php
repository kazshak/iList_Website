<?php
    header('Content-Type: application/json');

    function getDescObj($dir) { 
   
        $result = array(); 

        $cdir = array_diff(scandir($dir), array('..','.')); 
        foreach ($cdir as $key => $value) 
        { 
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
            { 
                $desc = json_decode(file_get_contents($dir . DIRECTORY_SEPARATOR . $value . DIRECTORY_SEPARATOR . 'desc.json'));
                $desc->filePath = $dir . DIRECTORY_SEPARATOR . $value . DIRECTORY_SEPARATOR;
                $result[] = $desc;

            } 
/*            else 
            { 
                $result[] = $value; 
            } */
        }
        
        function cmp($a, $b) {
            if ($a->sold === true) {
                $acmp = $a->closedDate;
            } else {
                $acmp = "9" . $a->listDate;
            }
            if ($b->sold === true) {
                $bcmp = $b->closedDate;
            } else {
                $bcmp = "9" . $b->listDate;
            }
            
            return strcmp($bcmp, $acmp);
            
/*            if ($a->price == $b->price) {
                return 0;
            }
            return ($a->price < $b->price) ? -1 : 1; */
        }
   
        usort($result, "cmp");
        return $result; 
    } 

    $directory = 'FeaturedProperties';
    $jsonData = json_encode(getDescObj($directory));
    print_r($jsonData);
?>