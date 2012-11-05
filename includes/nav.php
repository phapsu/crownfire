<?php
$navArray = array('' => 'Home',
				  	'aboutus.php' 	=> 'About Us',
				  	'services.php'	=> 'Services',
					'catalog.php'	=> 'Catalog',
					'contactus.php'	=> 'Contact Us',
					'jobs.php'		=> 'Jobs',
					'members/'		=> 'Customers',
					'sitemap.php'	=> 'Site Map');

foreach ($navArray as $url => $link) {

	if (basename($_SERVER['PHP_SELF']) == $url) {
		?>
		<li><a href="<?=$cfg['site_url']?>/<?=$url?>" class="active"><?=$link?></a></li>
		<?php
	} else {
		?>
		<li><a href="<?=$cfg['site_url']?>/<?=$url?>"><?=$link?></a></li>
		<?php
	}
}
?>