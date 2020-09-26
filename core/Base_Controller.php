<?php

    class Base_Controller extends Core_Controller {
        function __destruct()
        {
            $this-> renderlayout();
        }

        function renderlayout() {

            ob_start();

            $this->view->show();

            $content = ob_get_contents();

            ob_end_clean();

            $this->layout->load([
                'noidung'=> $content
            ]);

        }
    }