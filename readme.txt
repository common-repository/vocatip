=== Vocatip ===
Contributors: aviket
Tags: tooltip, content tooltip, wordpress tooltip plugin, jquery tooltip wordpress plugin, antonym, synonym, vocabulary
Requires at least: 3.0
Tested up to: 4.0.1
Stable tag: tooltip, jquery tooltip, wordpress tooltip, map tooltip
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
API Credit: Wordnik : Wordnik is fiscally sponsored by Planetwork NGO, Inc,a California 501(c) (3) non-profit educational organization, EIN #94-3366969.)
            https://wordnik.com/
            http://api.wordnik.com

== Description ==
Vocatip is a jquery tooltip plugin. It is used to display antonyms, synonyms, rhythms etc. of words in the post or page, when mouse is hovered over the word. It very easy to use.
The basic tooltip facility is borrowed from tooltipster wordpress plugin.
Link to the Tooltipster Jquery Library: http://iamceege.github.io/tooltipster/
URL for Tooltipster plugin: https://wordpress.org/plugins/tooltipster/
This plugin uses "wordnik" API for fetching the synonyms, antonyms etc. 
Wordnik is fiscally sponsored by Planetwork NGO, Inc,a California 501(c)
To know more about wordnik visit:
 https://wordnik.com/
 http://api.wordnik.com



it has 10+ features in the base tooltipster plugin.
example animation, position, title, text, image, speed, delay,icon ,theme, trigger etc.

After installing the plugin, you have to enclose the city name within opening and closing shortcodes like below:
The building was standing [vocatip]High[/vocatip]
[vocatip]Apart[/vocatip] from that, what are the other things?
Don't [vocatip ctype="antonym"]bother[/vocatip], I will look into it.

The plugin refers to worknik api for finding synonyms, antonyms etc.
There are other options, but synonym, antonym and rhyme work best
If the word is misspelled or it doesn't exist in wordnik database, the tooltip shows
the message "No Data Found".
You can use animation values 'fade', 'grow', 'swing', 'slide', 'fall'
You can override default theme (i.e colors, borders and general appearance).
There are four themes available "tooltipster-light" , "tooltipster-noir" , "tooltipster-punk" and "tooltipster-shadow"
There are other options available like delay, animationduration etc.
For using them, you have to pass them as arguments to the shortcode like:
[vocatip animation="swing"]Where[/vocatip] are you going today?

He was standing at the[vocatip theme="tooltipster-noir"]lower[/vocatip] level.

== Installation ==
<ul>
<li>From WP admin > Plugins > Add New</li>
<li>Search \"Tooltipster\" under search and hit Enter</li>
<li>Click \"Install Now\"</li>
<li>Click the Activate Plugin link</li>
</ul>


== Frequently Asked Questions ==
Vocatip can be added any where .



== Changelog ==
1.0
First Release
