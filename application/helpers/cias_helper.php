<?php 


if(!function_exists('format_URI'))
{

    function format_URI( $string, $separator = '-' )
    {
        $string = str_replace('nbsp;', '', $string);
        $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
        $special_cases = array( '&' => 'and', "'" => '','’'=>'','’’'=>'');
      
        $string = mb_strtolower( trim( $string ), 'UTF-8' );
        $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
        $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
        $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
        $string = preg_replace("/[$separator]+/u", "$separator", $string);
        $string = trim($string,'-');
        return $string;
    }
}


if(!function_exists('is_login_url'))
{

    function is_login_url()
    {
        $ci =& get_instance();
        $method = $ci->router->fetch_method();
        if($method == "login"){
            return true;
        }else{
            return false;
        }

    }
}








 ?>