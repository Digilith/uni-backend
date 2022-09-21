<?php
    class Drawer {
        // 0 - square, 1 - circle
        private $shape;
        // 0 - red, 1 - blue
        private $color;
        // 1 - 9
        private $size;

        function parseGet(){
            // 3-digit num
            $getQuery = $_GET['num'] % 1000;

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
                $tag = "<rect width='$this->size' height='$this->size fill='$this->color'/>";
            } else {
                $center = $this->size + 10;
                $tag = "<circle cx='$center' cy='$center r='$this->size' fill='$this->color'/>";
            }

            return $tag;
        }

    }
?>