if($j('#instconf_widget').val()=="timeline")
	{	$j('#instconf_twitter_id').hide();
	$j('#instconf_twitter_id_header').hide();
	$j('#instconf_twitter_id_container').next().hide();}
else
	{$j('#instconf_twitter_screen_name_header').hide();
	$j('#instconf_twitter_screen_name_container').hide();
	$j('#instconf_twitter_screen_name_container').next().hide();}	



$j('#instconf_widget').change(function() {
	if($j('#instconf_widget').val()=="timeline")
		{
		$j('#instconf_twitter_id').hide();
		$j('#instconf_twitter_id_header').hide();
		$j('#instconf_twitter_id_container').next().hide();
		
		$j('#instconf_twitter_screen_name_header').show();
		$j('#instconf_twitter_screen_name_container').show();
		$j('#instconf_twitter_screen_name_container').next().show();
		}
	if($j('#instconf_widget').val()=="tweet")
	{
		$j('#instconf_twitter_screen_name_header').hide();
		$j('#instconf_twitter_screen_name_container').hide();
		$j('#instconf_twitter_screen_name_container').next().hide();
		
		$j('#instconf_twitter_id').show();
		$j('#instconf_twitter_id_header').show();
		$j('#instconf_twitter_id_container').next().show();
	}
	
	
	});