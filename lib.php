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

class PluginBlocktypeTwitter extends SystemBlocktype {



    public static function get_title() {
        return get_string('title', 'blocktype.twitter');
    }

    public static function get_description() {
        return get_string('description', 'blocktype.twitter');
    }

    public static function get_categories() {
        return array('external');
    }

    public static function render_instance(BlockInstance $instance, $editing=false, $versioning=false) {
        $configdata = $instance->get('configdata');
        require_once('twitter_api/twitteroauth.php');
		require_once('twitter_api/config.php');
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET,ACCESS_TOKEN,ACCESS_TOKEN_SECRET);
        $result='';

        if(isset($configdata['widget']))
        {
        switch($configdata['widget'])
        {
        	case "tweet":
        if (isset($configdata['twitter_id'])) {	
        
        	$data = $connection->get('statuses/show/'.$configdata['twitter_id'],'','tweet');
        	if(isset($data->error))
        		{
        			switch ($data->error)
        			{
        				case "Not found":
        				return get_string('error_404_id','blocktype.twitter');
        				break;
        				default:
        				return get_string('error','blocktype.twitter');
        				break;
        			}
        		}
        		else if (isset($data->id)) 
        		{
        			$result=self::create_single_tweet($configdata['twitter_id'],$data);
        		}
        	}
        	break;
        	
        	case "timeline":
			
        	if (isset($configdata['twitter_screen_name'])) 	
        	{
        	$data = $connection->get('statuses/user_timeline.json?screen_name='.$configdata['twitter_screen_name']."&count=5",'','timeline');
        		if(isset($data->error))
        		{
        			switch ($data->error)
        			{
        				case "Not found":
        				return get_string('error_404_tl','blocktype.twitter');
        				break;
        				default:
        				return get_string('error','blocktype.twitter');
        				break;
        			}
        		}
        		else 
        		{
					$result=self::create_timeline($data);   
        		}	
        	}
        	
        break;	
        }
        }
        return $result;
    }

    public static function has_instance_config(BlockInstance $instance) {
        return true;
    }    
    
    private function create_timeline ($data)
    {
   		  $timeline=array();
   		  foreach ($data as $tweet)
   		  {
   		  	$timeline[]=self::create_tweet_content($tweet);
   		  }             
          $smarty = smarty_core();
          $smarty ->assign('tweets',$timeline);
          return $smarty->fetch('blocktype:twitter:timeline.tpl');
    }
    
    private function create_single_tweet($id,$data) {
    	global $THEME;
          $tweet_details=self::create_tweet_content($data);                    
          $smarty = smarty_core();
          $smarty ->assign('tweet_details',$tweet_details);
          $smarty ->assign('bird',$THEME->get_url('images/bird.png',false,'blocktype/twitter'));
          $smarty ->assign('reply', get_string('twitter_reply','blocktype.twitter'));
          $smarty ->assign('retweet',get_string('twitter_retweet','blocktype.twitter'));
          $smarty ->assign('favorite',get_string('twitter_favorite','blocktype.twitter'));
           return $smarty->fetch('blocktype:twitter:singletweet.tpl');
    }
    private function create_tweet_content($data)
    {
 
     	$base_url='';
    	$profile_bg_tile_HTML='';
    	$id=number_format($data->id,0,'','');
    	$name=$data->user->screen_name;
    	$timeStamp = strtotime($data->created_at);
    	$time = $timeStamp;                     
        $date = format_date($time);     
        $time_ago = self::how_long_ago( $time ); 
        
        $source = $data->source;
        preg_match( '`<a href="(http(s|)://[\w#!$&+,\/:;=?@.-]+)[^\w#!$&+,\/:;=?@.-]*?" rel="nofollow">(.*?)</a>`i', $source, $matches );
        if( ! empty( $matches[1] ) || ! empty( $matches[3]) )
            $source = '<a href="' .  $matches[1] . '" rel="nofollow" target="blank">' . $matches[3]  . '</a>';
        else
            $source = $source; 
            
            
        if ( !$data->user->profile_background_tile ) 
            $profile_bg_tile_HTML = " background-repeat:no-repeat";
          
         
         
    	$tweet_details = array(
                        'id' => $id,
                        'screen_name' => stripslashes($data->user->screen_name),
                        'real_name' => stripslashes($data->user->name),
                        'tweet_text' =>  stripslashes(self::autolink($data->text)),
                        'source' => $source,

                        'profile_pic' => $data->user->profile_image_url,
                        'profile_bg_color' => $data->user->profile_background_color,
                        'profile_bg_tile' => $data->user->profile_background_tile,
                        'profile_bg_image' => $data->user->profile_background_image_url,
                        'profile_text_color' => $data->user->profile_text_color,
                        'profile_link_color' => $data->user->profile_link_color,
    	 				'profile_bg_title_HTML' => $profile_bg_tile_HTML,
    	

    					'time_ago' => $time_ago,
    					'tweeted_on' => get_string('twitter_tweeted_on','blocktype.twitter')." ".$date,
    	
    					'profile_url' =>"http://twitter.com/intent/user?screen_name=".stripslashes($data->user->screen_name),
    					'url' => "http://twitter.com/#!/".$name."/status/".$id,
    	
    					'retweet_url' =>  "https://twitter.com/intent/retweet?tweet_id=$id", 
        				'reply_url' =>"https://twitter.com/intent/tweet?in_reply_to=$id", 
        				'favorite_url' => "https://twitter.com/intent/favorite?tweet_id=$id",
    	
    			
    	   	
                    );
                    
                    return $tweet_details;
    }
    
private static function how_long_ago( $date ) {
        $current = time();
        $difference = $current - $date;

        if ( strtotime( '-1 min', $current ) < $date)
            $output = get_string('twitter_less_minutes','blocktype.twitter');
        elseif ( strtotime( '-1 hour', $current ) < $date )
            $output = ( floor($difference / 60 ) == 1 ) ? get_string('twitter_1_minute_ago','blocktype.twitter') : floor( $difference / 60 ) . " ".get_string('twitter_minutes_ago','blocktype.twitter');
        elseif ( strtotime( '-1 day', $current ) < $date )
            $output = ( floor( $difference / 60 / 60 ) == 1 ) ? get_string('twitter_1_hour','blocktype.twitter') : get_string('twitter_about','blocktype.twitter')." " . floor( $difference / 60 / 60 ) . " ".get_string('twitter_hours_ago','blocktype.twitter');
        else
            $output = format_date($date); 

        return $output;
    }
 /**
     * Converts a normal line of text containing twitter functionality (@username, #hashtag)
     * into a 'linked' line of text
     * Supports @usernames, #hashtags and urls.
     * @param string $tweet The text to convert
     * @return string The linked text
     */
    private static function autolink ($tweet)
    {  	   
       // Autolink hashtags 
        $tweet = preg_replace(
                '/(^|[^0-9A-Z&\/]+)(#|\xef\xbc\x83)([0-9A-Z_]*[A-Z_]+[a-z0-9_\xc0-\xd6\xd8-\xf6\xf8\xff]*)/iu',
                '${1}<a href="http://twitter.com/search?q=%23${3}" title="#${3}"><b>${2}${3}</b></a>',
                $tweet
        );

        // Autolink just usernames 
        $tweet = preg_replace(
                '/([^a-zA-Z0-9_]|^)([@\xef\xbc\xa0]+)([a-zA-Z0-9_]{1,20})(\/[a-zA-Z][a-zA-Z0-9\x80-\xff-]{0,79})?/u',
                '${1}@<a href="http://twitter.com/intent/user?screen_name=${3}" class="twitter-action"><b>${3}</b></a>',
                $tweet
        );

        //Autolink Weblinks (HTML,Mailto,...)
         $tweet = preg_replace(
         		'#(^|[^\"=]{1})(http://|ftp://|mailto:|news:)([^\s<>]+)([\s\n<>]|$)#sm',
         		'${1}<a target="_blank" href=\"${2}${3}\"><b>${2}${3}</b></a>${4}',
         		$tweet
        );
        

        return $tweet;
    }
    
    	
    
    
    public static function instance_config_form(BlockInstance $instance) {
        $configdata = $instance->get('configdata');
 

   
        
         $elements['widget'] = array(
                'type' => 'select',
                'title' => get_string('widget','blocktype.twitter'),
                'description' => get_string('widgetdesc','blocktype.twitter'),
                'defaultvalue' => (!empty($configdata['widget']) ? $configdata['widget'] : 'tweet'),
				'options' => array(
					'tweet' => get_string('widgettweet','blocktype.twitter'),
					'timeline'  => get_string('widgettimeline','blocktype.twitter'),
				),
            );
        
             $elements['twitter_id'] = array(
               'type'  => 'text',
               'hidden' => true,
                'title' => get_string('twitter_id','blocktype.twitter'),
                'description' => get_string('twitter_iddesc','blocktype.twitter'),
                'defaultvalue' => (!empty($configdata['twitter_id']) ? $configdata['twitter_id'] : null),
                
                    'required' => true,
             
                
            );
               $elements['twitter_screen_name'] = array(
               'type'  => 'text',
                'title' => get_string('twitter_screen_name','blocktype.twitter'),
                'description' => get_string('twitter_screen_name_desc','blocktype.twitter'),
                'defaultvalue' => (!empty($configdata['twitter_screen_name']) ? $configdata['twitter_screen_name'] : null),
                
                    'required' => true,
             
                
            );
     
                return $elements;
    }




    public static function default_copy_type(BlockInstance $instance, View $view) {
        return 'shallow';
    }
 	public static function get_instance_config_javascript(BlockInstance $instance) {
        return array("theme/js/twitter.js");
    }

}

?>
