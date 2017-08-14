=== Indicate External Links  ===
Contributors: numeeja
Donate link: http://cubecolour.co.uk/wp
Tags: External, Link, Arrow, https, offsite
Requires at least: 3.7
Tested up to: 3.9
Stable tag: 1.0.0
License: GPLv2

Indicates external links in post, page and custom content.


== Description ==

A simple and lightweight plugin to indicate external http and https links in posts, pages and custom content by appending a small diagonal arrow icon to the link.

No configuration is required just install and activate.

== Installation ==

1. Upload the plugin folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where is the admin page? =

This plugin does not have any options, so there is no admin page.

= Does this work for http and https links? =

Yes

= Can I customise how the link is displayed? =

Yes you can add some CSS to your child theme
= Example =
`
	.nav-menu .extlink:after {
		color:'#bada55';
	}
`

For maximum flexibility you can copy the plugin's styles to you child theme's stylesheet and make changes to that if you also prevent the default styles from loading.

You can add CSS rules to enable you to use a glyph from a custom icon font.

To deactivate the default CSS, add the following line to your child theme's functions.php file:
`
<?php remove_action('wp_head', 'cc_extlink_style'); ?>
`

= Exceptions: Will all external links have an arrow added? =

Linked images will not have the arrows added.

External links inside WordPress custom menus and links inside image captions will not have the arrows added but custom CSS can be used to override these exceptions.


= Can I add other exceptions so that some types of links to prevent the arrow being added? =

Yes, add a CSS rule to your child theme.
Target the links you don't want affected with greater specificity to override the default CSS of the plugin.
**Example**
`
	.myclass .extlink:after {
		content:'';
	}
`
= Why doesn't it work on my site? =

This plugin does work as intended on the sites it was tested it on whilst it was being developed. If you have a problem getting it to work on your site, first read the documentation and check the [plugin's support forum](http://wordpress.org/support/plugin/indicate-external-links/ "Indicate External Links plugin support forum") to see whether your issue has been previously resolved. If you do not find an answer, please ask for help on the forum giving as much information as possible so I can try to guide you through some troubleshooting steps to help you to fix your issue. If you have a problem, please do not post a review before asking for help.

= I am using the plugin and love it, how can I show my appreciation? =

You can donate via [my donation page](http://cubecolour.co.uk/wp/ "cubecolour donation page"). If you find the plugin useful I would also appreciate a review (five stars would be nice) on the [plugin review page](http://wordpress.org/support/view/plugin-reviews/indicate-external-links "Indicate External Links plugin review page"

== Screenshots ==

1. Links

== Changelog ==

= 1.0.0 =
* Initial Version

== Upgrade Notice ==

= 1.0.0 =
* Initial Version
