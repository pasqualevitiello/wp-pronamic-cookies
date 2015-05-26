== Description ==

The Pronamic Cookies plugin allows you to activate a cookie solution on
your WordPress website. This is a fork for creating landing pages on themes created for demo purpose (e.g. Themeforest demos)

= Why this fork? =

I am a WordPress developer on Themeforest and I have to comply with the Italian Cookie Law too for my demos.
As I don't want to show crappy demos to potential customers, I decided to
create a kind of landing page to make users accept cookies before entering the demo itself.

This plugin was exactly what I was looking for, I just added some new extra fields.
But in the settings panel you will only find the Wall feature, all the other ones have been removed because were useless to me (bar, section, etc.).

= How the Wall works? =

The cookie wall technique is a full site lockout until cookies have been 
accepted. It is run before anything that can set any JavaScript or cookies. 
A background image, color and text are modifiable from the settings.

== Installation ==

1.	Upload 'wp-pronamic-cookies-demo' to the '/wp-content/plugins/' directory,
2.	Activate the plugin through the 'Plugins' menu in WordPress.

== Cache plugins compatibility ==

To make wotk this plugin with caching plugins, you may need to configure them correctly. The main problem is with page cache. For instance, to make it work
with W3 Total Cache go to Page Cache -> Rejected cookies and add there the name of the cookie used by this plugin (in my case "cookie_notice_accepted").

== Contribute ==

Feel free to contribute to this fork (I would love to see a "Related themes" links below the main card or new CSS themes) or to update it if necessary.


== Credits ==

Thanks to pronamic for this awesome plugin!