<?php
// [ux_icon] IN DEVELOPMENT!
function ux_icon_shortcode($atts, $content=null, $code) {
    $mapsrandomid = rand();
    extract(shortcode_atts(array(
      'id'  => '',
      'size'  => '32px',

    ), $atts));
   ob_start();
  ?> 
    
 
<svg version="1.1" class="ic-glow ux-icon ux-icon-circle" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
  <path d="M256,128c-81.9,0-145.7,48.8-224,128c67.4,67.7,124,128,224,128c99.9,0,173.4-76.4,224-126.6
    C428.2,198.6,354.8,128,256,128z M256,347.3c-49.4,0-89.6-41-89.6-91.3c0-50.4,40.2-91.3,89.6-91.3s89.6,41,89.6,91.3
    C345.6,306.4,305.4,347.3,256,347.3z"/>
  <g>
    <path d="M256,224c0-7.9,2.9-15.1,7.6-20.7c-2.5-0.4-5-0.6-7.6-0.6c-28.8,0-52.3,23.9-52.3,53.3c0,29.4,23.5,53.3,52.3,53.3
      s52.3-23.9,52.3-53.3c0-2.3-0.2-4.6-0.4-6.9c-5.5,4.3-12.3,6.9-19.8,6.9C270.3,256,256,241.7,256,224z"/>
  </g>
</g>
</svg>

<style type="text/css">
.ux-icon-circle{
-webkit-border-radius: 999px;
-moz-border-radius: 999px;
border-radius: 999px;
padding: 10px;
border:2px solid #4d6371;
}
.ux-icon{
   width: 122px;
   height: 122px;
   fill:#4d6371;
    -webkit-transition: all 0.3s ease;                  
    -moz-transition: all 0.3s ease;                 
    -o-transition: all 0.3s ease;   
    -ms-transition: all 0.3s ease;          
    transition: all 0.3s ease;
}
.ux-icon:hover{
  -webkit-filter: drop-shadow(0px 0px 10px #ccc); 
    filter: drop-shadow(5px 5px 2px black);
}

.ux-icon:hover{
  -webkit-filter: drop-shadow(0px 0px 10px #ccc); 
    filter: drop-shadow(5px 5px 2px black);
}
</style>

<svg version="1.1" class="ic-glow ux-icon" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
  <path class="st0" d="M240,0L240,0C116,0.3,16.5,100.4,16.5,224c0,123.6,99.5,223.7,223.5,224v64c141,0,256-114.6,256-256
    S381,0,240,0z M224,202v60v26c0,26.5-21.5,48-48,48v-32c8.8,0,16-7.2,16-16v-16h-70c-5.5,0-10-4.5-10-10V154c0-5.5,4.5-10,10-10h92
    c5.5,0,10,4.5,10,10V202z M400,202v60v26c0,26.5-21.5,48-48,48v-32c8.8,0,16-7.2,16-16v-16h-70c-5.5,0-10-4.5-10-10V154
    c0-5.5,4.5-10,10-10h92c5.5,0,10,4.5,10,10V202z"/>
</g>
</svg>

    
  }?>
  <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

add_shortcode('ux_icon', 'ux_icon_shortcode');
