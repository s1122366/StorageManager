<?php
    function output($result,$total_count,$msg){
        if(!$result){
            $code = 2;
            $n_rows = 0;
            $data = array();
        }
        else if($result->num_rows == 0){
            $code = 1;
            $msg = "Empty Set";
            $n_rows = 0;
            $data = array();
        }else{
            $code = 0;
            $msg = "Query success";

            $arr = array();
            while($row = mysqli_fetch_array($result)) {
                $count=count($row);
                for($i=0;$i<$count;$i++){
                    unset($row[$i]);
                }
                array_push($arr,$row);
            }
        }

        $out = array(
            "code" => $code, 
            "msg" => $msg,
            "count" => $total_count,
            "data" => $arr
            );
        return json_encode($out,JSON_UNESCAPED_UNICODE);
    }
?>