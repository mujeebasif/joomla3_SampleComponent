<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

class SampleControllerAjax extends JControllerForm
{
    function saveMydata()
    {
        $res=$this->curlIt();

        if( empty($res['res']) )
        {
            header('HTTP/1.1 500 Internal Server Error',true,500);
            echo 'curl error';
            print_r($res['error']);
            return false;
        }

        echo 'response saved successfully to file: <b>'.$res['filename'].'</b><br/>';

        $response=$this->fetchUsers();

        echo '<h6>List of users:</h6>';

        var_dump($response);

    }

    function curlIt()
    {
        $params 	= JComponentHelper::getParams('com_sample');
        $url=$params->get('curl_url');

        //fallback
        if(empty($url))
        $url = 'http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi';

        $params=array(
            'fname'=>'mjb',
            'lname'=>'asf'
        );

        $ch=curl_init($url); //intilize session

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Tell curl to use HTTP POST
        curl_setopt ($ch, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);

//        curl_setopt($ch, CURLOPT_VERBOSE, true);
//        $verbose = fopen('php://temp', 'w+');
//        curl_setopt($ch, CURLOPT_STDERR, $verbose);

        $response=curl_exec($ch);  // $buffer=curl_exec($ch);
        $error = curl_error($ch);

//        rewind($verbose);
//        $verboseLog = stream_get_contents($verbose);
//        echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";

        curl_close($ch); //close sesion

        if($response ===FALSE)
        {
            return array('res'=>false,'error'=>$error);
        }
        else
        {
            $dir= "/tmp";//sys_get_temp_dir();//  /tmp | php://temp
            $tempfnam = tempnam($dir, "temporary");

            $handle = fopen($tempfnam, "w+");
            fwrite($handle, $response);
            fclose($handle);

            return array('res'=>true,'error'=>$error,'filename'=>$tempfnam);
        }
    }

    function fetchUsers()
    {
        $db = JFactory::getDbo();

        $query = "
            SELECT *
            FROM #__users
            ORDER  BY id
            limit 10
        ";

        $db->setQuery($query);

        return $db->loadObjectList();
    }
}