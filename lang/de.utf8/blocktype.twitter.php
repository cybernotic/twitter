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
 * @copyright  (C) 2010 Florian Eder
 *
 */

defined('INTERNAL') || die();

$string['title'] = 'Tweet/Timeline';
$string['description'] = 'Einbetten eines Tweets oder einer Timeline';
$string['twitter_id'] = 'Twitter Tweet ID';
$string['twitter_iddesc'] = 'Twitter Tweet ID hier einfügen.Durch Klicken auf das Datum in einem Tweet wird die ID in der Adressleiste angezeigt. ( Wird nur benoetigt, wenn bei Anzeigetyp Tweet ausgewaehlt wurde.) ';

$string['twitter_tweeted_on']='getwittert am';

$string['twitter_reply']='Antworten';
$string['twitter_retweet']='Retweet';
$string['twitter_favorite']='Als Favorit markieren';

$string['twitter_less_minutes']='weniger als eine Minute ';
$string['twitter_1_minute_ago']='vor einer Minute';
$string['twitter_1_hour_']='vor einer Stunde';
$string['twitter_hours_ago']='Stunden';
$string['twitter_minutes_ago']='Minuten';
$string['twitter_about']='vor';

$string['widget']='Anzeigetyp';
$string['widgettweet']='Tweet';
$string['widgettimeline']='Timeline';
$string['widgetdesc']='Es kann entweder ein einzelner Tweet (Auswahl: Tweet) mittels Tweet ID oder die Timeline eines bestimmten Users über dessen Anzeigenamen(Auswahl: Timeline) angezeigt werden. Es muss immer nur entweder die Twitter Tweet ID oder der Anzeigename ausgefüllt werden.';
$string['twitter_screen_name']='Anzeigename';
$string['twitter_screen_name_desc']='Twitter-Anzeigename hier einfügen (Wird nur benoetigt, wenn bei Anzeigetyp Timeline ausgewaehlt wurde.)';

$string['error']='Fehler beim Anzeigen des Plugins.';
$string['error_404_id']='Die angegebene Tweet ID konnte nicht gefunden werden.';
$string['error_404_tl']='Der angegebene Anzeigename konnte nicht gefunden werden.';
?>
