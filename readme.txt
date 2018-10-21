=== Shortcodes for Yotpo ===
Contributors: hxii
Tags: yotpo, shortcode, shortcodes, yotpo add-on
Requires at least: 4.6
Tested up to: 4.9.8
Stable tag: 1.0.1
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin adds the ability to use shortcodes to control the placement of Yotpo widgets.

== Description ==
= Prerequisites (Important) =
* The Yotpo plugin must be installed (obviously).
* WooCommerce 3.X and above (due to new methods).
This plugin allows using shortcodes to display Yotpo widgets inside and oustide (applicable widgets only) of product pages e.g. page builders, sidebars, widgets etc.
= Usage =
```
[yotpo_widget]
[yotpo_bottomline]
[yotpo_product_gallery gallery_id="5bbb561f5ea79223a9da0e7c"]
[yotpo_product_reviews_carousel background_color="#22fff2" mode="most-recent" type="both" count="3"]
```
For the reviews carousel, get the attributes when generating the code from your Yotpo dashboard.
Special arguments exclusive to this plugin:
1. **yotpo_product_gallery** - adding `noproduct` will prevent a product ID being added if the gallery is not a product gallery.
2. **yotpo_product_reviews_carousel**:
adding `product_id="product-id-here"` will display a reviews carousel for the given product id.
adding `noproduct` will prevent a product id from being added in case you need a reviews carousel for all reviews.
3. **yotpo_widget** and **yotpo_bottomline** accept an optional `product_id` argument (e.g. `product_id="47") if you'd like to provide a product ID. Otherwise, the ID of the current product will be used.

For updates & stuff: http://paulglushak.com/yotpo-shortcodes-for-woocommerce/

== Installation ==
Installation is very simple:
1. Upload the plugin files to the `/wp-content/plugins/yotpo-shortcodes` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==
= A shortcode is missing! / I need more shortcodes! =
Get in touch, and I'll see what can be done.

== Screenshots ==
1. Example usage of the shortcodes.
== Changelog ==
= 1.1 =
* Added badge widget.
* Added optional `product_id` arguments to main widget and bottomline widget.
* Now returning HTML instead of echoing yotpo functions.
* Make sure to return nothing if post is not a product and no ID is supplied.
= 1.0.1 =
* Added `noproduct` arguments.
* Initial release on WP.
= 1.0 =
* Initial commit.