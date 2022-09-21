<?php
    class Drawer {
        // 0 - square, 1 - circle
        private $shape;
        // 0 - red, 1 - blue
        private $color;
        // 1 - 10
        private $size;

        function parseGet(){
            // 3-digit num
            $getQuery = $_GET['num'] % 1000;
            if ($getQuery < 10) {
                $getQuery *= 100;
            } elseif ($getQuery < 100) {
                $getQuery *= 10;
            }

            // 0 or 1
            $this->shape = $getQuery / 100 % 2;
            
            // color
            if (($getQuery / 10 % 10 % 2) == 0) {
                $this->color = 'red';
            } else {
                $this->color = 'blue';
            }

            // size
            $this->size = $getQuery % 10 + 1;
        }

        function draw(){
            $tag = "";
            
            if($this->shape == 0){
                $tag = "<rect x='$this->size' y='$this->size' width='$this->size' height='$this->size' fill='$this->color'/>";
            } else {
                $center = $this->size + 10;
                $tag = "<circle cx='$center' cy='$center' r='$this->size' fill='$this->color'/>";
            }
            return $tag;
        }

    }


    $drawer = new Drawer();
    $drawer->parseGet();

    $svg_begin = '<svg viewBox="0 0 100 100">';
    $svg_end   = '</svg>';

    echo $svg_begin;
    echo $drawer->draw();
    echo $svg_end;
?>