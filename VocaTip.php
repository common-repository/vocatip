<?php

/**
 * Plugin Name: vocatip
 * Plugin URI: https://wordpress.org/plugins/vocatip/
 * Description: vocatip is a free wordpress tooltip plugin shows antonyms and synonyms  of words on hovering mouse over the word.
 * Version: 1.0
 * Author: aviket
 * License: GPL2
 */
function vocatip($atts, $content) {
   
    static $tooltipID = 0;
    $attrs = shortcode_atts(array(
        'text' => 'Your Tooltip Text Here',
        'title' => 'Tooltip Title',
        'position' => 'top',
        'trigger' => 'hover',
        'animation' => 'slide',
        'speed' => 350,
        'image' => '',
        'theme' => 'tooltipster-punk',
        'ctype' => 'synonym',
        'zoom' => '12'
            ), $atts);
    $tooltipID++;
    $output = '<span class="tooltipster" id="tooltipster' . $tooltipID . '" title="">';
    $output .= '<font color="red">';
	$output .= $content;
	 $output .= '</font>'; 
    $output .='</span>';
    $image = $attrs['image'];
    $title = $attrs['title'];
	 $content = ucwords($content);
    $tooltipContent = '<span class="tooltipster_content"><strong><b>' . $title . '</b>' . $attrs['text'] . '</strong></span>';
    ?>
    <script type="text/javascript">


        jQuery.ajax({
            url: 'http://api.wordnik.com:80/v4/word.json/<?php echo strtolower($content); ?>/relatedWords?useCanonical=false&relationshipTypes=<?php echo $attrs["ctype"]; ?>&limitPerRelationshipType=10&api_key=3bc8d1e1ce7653343e0010549cc0e29f066abc615012aeab3',
            dataType: 'json',
            type: 'GET',
            async: true,
            crossDomain: true
        }).done(function (data) {

            if (!(data === undefined || data === null || data.length == 0)) {
                var oup = '<b><?php echo $attrs["ctype"]; ?></b>';
                oup = oup + '<table border="1">';
                var wordarraylength = data[0].words.length;
                for (var i = 0; i < wordarraylength; i++) {
                    oup = oup + '<tr>';
                    oup = oup + '<td>' + data[0].words[i] + '</td>';
                    oup = oup + '</tr>';
                }
                oup = oup + '</table>';
               
                // do something 

                // var lat = data.elements[0].lat;
                // var lon = data.elements[0].lon;
                // latlon = lat + ',' + lon;
                jQuery("<?php echo '#tooltipster' . $tooltipID; ?>").tooltipster({
                    // content: jQuery('<?php echo $tooltipContent; ?>'),
                    content: oup,
                    animation: '<?php echo $attrs["animation"]; ?>',
                    position: '<?php echo $attrs["position"]; ?>',
                    theme: '<?php echo $attrs["theme"]; ?>',
                    touchDevices: false,
                    trigger: '<?php echo $attrs["trigger"]; ?>',
                    speed: '<?php echo $attrs["speed"]; ?>',
                    maxWidth: '150',
                    //ctype: '<?php echo $attrs["ctype"]; ?>'
                    // image: '',
                    contentAsHTML: true
                            // zoom: 12
                            //console.log(data[0].words);
                });
                console.log("second success");
            }
            else
            {
                jQuery("<?php echo '#tooltipster' . $tooltipID; ?>").tooltipster({
                    //content: jQuery('<?php echo $tooltipContent; ?>'),
                    content: '<div>No Data Found</div>',
                    title: 'No synonyms Found',
                    animation: '<?php echo $attrs["animation"]; ?>',
                    position: '<?php echo $attrs["position"]; ?>',
                    theme: '<?php echo $attrs["theme"]; ?>',
                    touchDevices: false,
                    trigger: '<?php echo $attrs["trigger"]; ?>',
                    speed: '<?php echo $attrs["speed"]; ?>',
                    //image: '',
                    contentAsHTML: true
                            // zoom: 12
                });
                console.log("second success");

            }

        }).fail(function (error) {
            console.log(error);
            console.log("error");
        }).always(function () {
            console.log("complete");
        });


    </script>
    <?php
    return $output;
}

add_shortcode('vocatip', 'vocatip');

function vocatipscript() {
    wp_enqueue_script('jquery');
    wp_enqueue_style('tooltipster', plugin_dir_url(__FILE__) . 'css/tooltipster.css');
    wp_enqueue_script('tooltipster_js', plugin_dir_url(__FILE__) . 'js/jquery.tooltipster.min.js', array('jquery'), '', true);
    wp_enqueue_script('tooltipster_active', plugin_dir_url(__FILE__) . 'js/tooltipster_active.js', array('tooltipster_js'), '', true);
}

add_action('wp_enqueue_scripts', 'vocatipscript');
?>