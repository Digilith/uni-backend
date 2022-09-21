<?php 
    class BootlegUnix {
        private $cmd;

        function setCmd(){
            $this->cmd = $_GET['>'];
        }

        function execCmd(){
            $tag = 'Unknown command, see <i>help</i>';
            if ($this->cmd == 'ls') {
                $tag = 'drawer.php<br>index.php<br>info.php<br>sort.php';
                return $tag;
            } elseif ($this->cmd == 'whoami') {
                $tag = 'ebotsieva';
                return $tag;
            } elseif ($this->cmd == 'help') {
                $tag = 'ls: lists current directiry<br>whoami: current user';
                return $tag;
            } else {
                return $tag;
            }
        }
    }

    $bootleg = new BootlegUnix();

    $bootleg->setCmd();
    echo $bootleg->execCmd();

?>