
<?php
// No direct access to this file

/*------------------------------------------------------------------------
# com_sample  mod_sample
# ------------------------------------------------------------------------
# author    mmamjb Web Designs & Development
# copyright Copyright (C) 2010 http://www.mmamjb.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.mmamjb.com
# Technical Support:  Contact - http://www.mmamjb.com/contact.html
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');

?>

<div id="cpanel" style="float:left; width:60%;">

    <input type="button" value="CurlIt" class="btn btn-primary btn_curl" />

  <!--<div class="icon-wrapper">
    <div class="icon"> <a href="index.php?option=com_sample&view=samplelist"> <img alt="" src="templates/bluestork/images/header/icon-48-article.png"><span>SampleList</span></a> </div>
  </div>-->

</div>

<div style="clear:both;"></div>
<h6>Curl Response:</h6>
<div class="well" id="curl_response">

</div>


<div style="clear:both;"></div>
<!--<div style="width:100%; height:auto; text-align:right;">Component Developed by mmamjb1.</div>-->

<script>
    var $=jQuery;
    $(document).ready(function(){

        $(document).on('click','.btn_curl',function(){

            var $that = $(this);

            //loader
            $that.css('opacity',0.3);

            var url = 'index.php?option=com_sample&task=ajax.saveMydata&format=raw';

            $.post(url,function(data){
                //console.log(data);
                $('#curl_response').html(data);
            })
            .fail(function(ob,st,err){
                console.log(ob,st,err);
                var res = 'Oops! something went wrong. try again. <br/> see console for technicals detail';
                $('#curl_response').html(res);
            })
            .always(function(){
                $that.css('opacity',1);
            });

        });

    });
</script>