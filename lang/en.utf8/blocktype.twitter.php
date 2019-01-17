<?php
/**
 * Mahara: Electronic portfolio, weblog, resume builder and social networking
 * Copyright (C) 2006-2009 Catalyst IT Ltd and others; see:
 *                         http://wiki.mahara.org/Contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    mahara
 * @subpackage blocktype-twitter
 * @author     Florian Eder
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2011 Florian Eder
 *
 */

defined('INTERNAL') || die();

$string['title'] = 'Tweet/Timeline';
$string['description'] = 'Shows a Twitter Tweet or Timeline';
$string['twitter_id'] = 'Twitter Tweet ID';
$string['twitter_iddesc'] = 'Past the Tweet ID, to show full Tweet, you can get the ID by clicking on the DateLink on your TwitterTweet( Wird nur benoetigt, wenn bei Anzeigetyp Tweet ausgewaehlt wurde.)';

$string['twitter_tweeted_on']='tweeted on';

$string['twitter_reply']='Reply';
$string['twitter_retweet']='Retweet';
$string['twitter_favorite']='Favorite';

$string['twitter_less_minutes']='less than a minute ago';
$string['twitter_1_minute_ago']='1 minute ago';
$string['twitter_1_hour_']='about 1 hour ago';
$string['twitter_hours_ago']='hours ago';
$string['twitter_minutes_ago']='minutes ago';
$string['twitter_about']='about';

$string['widget']='Displaytype';
$string['widgettweet']='Tweet';
$string['widgettimeline']='Timeline';
$string['widgetdesc']='You can choose between a single Tweet (Tweet) or the Timeline of a specified User (Timeline)';
$string['twitter_screen_name']='Screenname';
$string['twitter_screen_name_desc']='Past the Twitter screen name, only use this if you have choosen "Timeline" before.';

$string['error']='Error';
$string['error_404_id']='The requested Tweet ID could not be found.';
$string['error_404_tl']='The requested screenname could not be found.';
?>
