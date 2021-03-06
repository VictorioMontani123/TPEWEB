<?php

class ApiView{

        public function responce($data, $status){
            header("content-type: applcation/json");
            header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
            echo json_encode($data); // me devuelve json
        }
        private function requestStatus($code){
            $status = array(
                200 => "OK",
                404 => "Not found",
                500 => "Internal Server Error"
            );
            return (isset($status[$code]))? $status[$code] : $status[500];
        }
}