
{foreach from=$tweets item=tweet_details}
<!-- tweet id : {$tweet_details['id']} -->
<div  style="padding: 10px 20px;
 	border-bottom: 1px solid #EBEBEB;
    border-top: 1px solid transparent;
    clear: both;
    display: block;
    margin-top: -1px;
    min-height: 60px;
    outline: medium none;
    position: relative;
">
  <div style=" float: left; height: 48px; margin-top: 3px; overflow: hidden;width: 48px;">
      <img alt="{$tweet_details['real_name']}" src="{$tweet_details['profile_pic']}">
  </div>
  
  <div style="  margin-left: 58px; min-height: 48px;">
    <div style="display: block; line-height: 15px; position: relative;">
    	<span style="color:#444444;">
 			 <a target="_blank" title="{$tweet_details['real_name']}" href="{$tweet_details['profile_url']}"  style="color:#333333 !important; font-size:15px; font-weight:bold;">{$tweet_details['screen_name']}</a>
 		 	 <span style="color:#999999; font-size:12px">{$tweet_details['real_name']}</span>
  		</span>
    </div>
    
   	<div style="display: block;line-height: 15px;position: relative;">
      <div style="line-height:19px; padding: 0;word-wrap: break-word; "> {$tweet_details['tweet_text']|clean_html|safe}</div>
   	</div>
    
    <div style="display: block;line-height: 15px;position: relative;">
      <a target="_blank" title="{$tweet_details['tweeted_on']}" style="color: #999999 !important;font-size: 11px;" href="{$tweet_details['url']}">
      	<span>{$tweet_details["time_ago"]}</span>
      </a>
    </div>
    
  </div>
</div>
  <!-- end of tweet -->
        