<!-- tweet id : $id -->
        <div   style='padding:20px; margin:5px 0; background-color:#{$tweet_details["profile_bg_color"]}; background-image:url({$tweet_details["profile_bg_image"]});{$tweet_details["profile_bg_tile_HTML"]}'>
            <div style='background:#fff; padding:10px; margin:0; min-height:48px; color:#$profile_text_color; -moz-border-radius:5px; -webkit-border-radius:5px;'>
                <span style='width:100%; font-size:16px; line-height:22px;'>
                    {$tweet_details['tweet_text']|clean_html|safe}
                </span>
                <div style='font-size:12px; width:100%; padding:5px 0; margin:0 0 10px 0; border-bottom:1px solid #e6e6e6;'>
                    <img align='middle' src='{$bird}' />
                    <a title='{$tweet_details["tweeted_on"]}' href='{$tweet_details["url"]}' target='_blank'>{$tweet_details["time_ago"]}</a> via {$tweet_details["source"]|clean_html|safe}
                    <a href='{$tweet_details["reply_url"]}'  title='Reply'>
                        <span><em style='margin-left: 1em;'></em><strong>{$reply}</strong></span>
                    </a>
                    <a href='{$tweet_details["retweet_url"]}'  title='Retweet'>
                        <span><em style='margin-left: 1em;'></em><strong>{$retweet}</strong></span>
                    </a>
                    <a href='{$tweet_details["favorite_url"]}' title='Favorite'>
                        <span><em style='margin-left: 1em;'></em><strong>{$favorite}</strong></span>
                    </a>
                </div>
                <div style='float:left; padding:0; margin:0'>
                    <a href='{$tweet_details["profile_url"]}'>
                        <img style='width:48px; height:48px; padding-right:7px; border:none; background:none; margin:0' src='{$tweet_details["profile_pic"]}' />
                    </a>
                </div>
                <div style='float:left; padding:0; margin:0'>
                    <a style='font-weight:bold' href='{$tweet_details["profile_url"]}'>@{$tweet_details['screen_name']}</a>
                    <div style='margin:0; padding-top:2px'>{$tweet_details['real_name']}</div>
                </div>
                <div style='clear:both'></div>
            </div> 
        </div>
        <!-- end of tweet -->