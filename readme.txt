=== Ready To Publish ===
Contributors: whyisjake
Donate link: http://jakespurlock.com/donate/
Tags: post, publish, admin, javascript
Requires at least: 3.0.1
Tested up to: 4.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Ever accidentally published a post? This will add a small checkbox to ensure that you don't make that small mistake again.

== Description ==

Ever accidentally published a post? This will add a small checkbox to ensure that you don't make that small mistake again. If you forget to check the option, it gives a little shake, and you can check again to publish.

== Installation ==

1. Upload the `/ready-to-publish/` director to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Or, you know, since this is post 2008, use the admin options.

== Frequently Asked Questions ==

= Can this be translated? =

I think?

= What if I want to change the text of the option? =

Drop something like the following code into your `functions.php` file.

    add_filter( 'ready_to_publish', function() { return ' AWESOME NEW TEXT'; } );

== Screenshots ==

1. This is what the checkbox looks like in the admin, with the default text. Smashing right?

== Changelog ==

= 0.5.0 =
New release!