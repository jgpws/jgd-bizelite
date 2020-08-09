=== JGD-BizElite ===

Contributors: jgpws
Tags: two-columns, three-columns, custom-header, custom-background, custom-colors, editor-style, custom-menu, featured-images, theme-options, translation-ready
Requires at least: 4.0
Requires PHP: 5.6
Tested up to: 5.4
Stable tag: 1.4.3
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0-standalone.html

== Copyright ==

JGD-BizElite WordPress Theme, Copyright 2012, 2020 Jason G Designs
JGD-BizElite is distributed under the terms of the GNU GPL.

== Description ==

JGD-BizElite is a free, responsive/fixed theme with premium features. Ideal for a content heavy blog, JGD-BizElite is packed with options. Customizer modifications include WordPress's Custom Logo, Custom Header, custom menus and background. Additional Customizer options give you the ability to hide post date, tag and category links, and change the footer text. Eight layouts, six color schemes and two custom page templates are included.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

JGD-BizElite supports Jetpack's Responsive Videos feature when the plugin is enabled

== Credits ==

* Themify Icons, Copyright 2019 Lally Elias, SIL Open Font License, https://github.com/lykmapipo/themify-icons

== Changelog ==

= 1.4.3 August 09 2020 =
Added support for the wp_body_open function.

= 1.4.2 March 16 2020 =
Version 1.4.1 was broken because I forgot to copy over all JavaScript files to the dist folder in Gulp. This is fixed in version 1.4.2.

= 1.4.1 March 16 2020 =
Updated screenshot; Moved template parts to template-parts folder; Adjusted Search page for the Featured Articles layout; Search results pages now use excerpts.

= 1.4.0 January 2020 to March 11 2020 =
New version. Moved main menus to a new location under the header. Set a new maximum width of 1366px. Refactored the underlying code to follow SMACSS principles and use SASS. Removed individual stylesheets for custom colors/layouts and added to main stylesheet using parent class names switched via body class filters and the Customizer. Added a new Featured Articles post layout style.

= 1.3.1 November 25 2019 =
Adjusted Gutenberg gallery styles to be similar to non-Gutenberg galleries. Adjusted JavaScript for social media icon panel. Minor fix for captioned images. New readme.txt format required for themes.

= 1.3 February 2018 =
New major version with several new features. Added support for WordPress native Custom Logo feature. Added an option to replace meta text information with Themify icons (ex. replacing "By" with an icon font). Added support via menu for social media profile icons for blog/website owners to promote their social media pages. Other small fixes include toning down the blue link color in the default color scheme and converting some of the JavaScript live previews to use Selective Refresh.

In addition, I added a new page template, Featured Categories, which displays the content, and up to three latest posts from three categories.

= 1.2.1 December 08 2017 =
Bug fix: made the default background behind the blog title and subtitle match the design for "Black (default)" when chosen in the Customizer.

= 1.2.0 November 30 to December 06 2017 =
Substituted a single SVG (Scalable Vector Graphics) image sprite in place of all background images. An SVG will look clear in high definition screens, while a single image will save on http requests. Set a max-width of 1280 pixels for the #wrapper div. Set a new default background color in Customizer of dark gray.

Fixed Pages and Category menus to use buttons for dropdowns, used absolute positioning on the menus, so that the headings don't stretch after clicking them; Adjusted the blog title and subtitle to have a semi-transparent colored background for better contrast against background header images.

Made new functions for the color switch statements in jgd_bizelite_customizer-frontend.php. Updated the live preview to account for the new site title background design when a custom header image is shown.

Fixed magazine stylesheets to account for the new maximum width. Adjusted gallery images in magazine layouts to fit.

= 1.1.8 May 05 2017 =
Added escaping to a few more functions; rearranged code in functions.php, so wp_enqueue_style did not have to called a second time for wp_add_inline_style; Used the_archive_description in author.php; Fixed readme.txt to include proper licensing terminology; fixed CSS issues in the sidebar using the Monster Widget plugin.

= 1.1.7 March 07 2017 =
Added more escaping to author.php. Missing escaping and translation wrappers added to sidebar.php.

= 1.1.6 March 04 2017 =
Changed searchform widget again to account for title; Added escaping wrappers to attributes in jgd_bizelite_header_style function and in footer.php; Added translations to various strings; Replaced titles in Archive, Category, Author and Tag templates; Moved enqueueing of comment-reply script from the header to functions.php; Moved all add_theme_support calls into the jgd_bizelite_setup function, which hooks to after_setup_theme; Removed empty Languages folder.

= 1.1.4 February 25 2017 =
Added esc_url() wrapper for all references to home_url('/'); Added translation functions to strings in author.php, sidebar.php, comments.php, 404.php; Updated licensing information for scripts and the screenshot in readme.txt; Fixed searchform widget width to fit the sidebar correctly.

= 1.1.3 October 2016 =
Prefixed Customizer and other functions with the text domain (jgd-bizelite). Removed browser title bar functions and filter for title-tag theme support. Used wp_add_inline_style instead of a function to reference a template directory path in an external JavaScript file. More minor fixes.

= 1.1.2 August 28 2016 =
Prefixed all functions and Customizer settings/controls with jbe_, so as not to conflict with other themes or plugins.

= 1.1.1 April 20 2016 =
Fixed rendering issue in mobile view with Reply link; fixed display problem with author.php template-- incorrectly named function calls were causing the page to be cut off prematurely; Got rid of the 120px height for custom header in mobile view, as this cut off long subtitles.

= 1.1 April 06 to April 11 2016 =
Updated the Continue Reading links to have a more cohesive look with other elements in the design. Made the text and header links colored to a dark variant of each color in the Customizer Styles. Adjusted other elements with a darker color as well. Made form controls cleaner and changed the color of outlines to a medium gray. Added whitespace to buttons and text fields.
Made the backgrounds for each color scheme consistent with the default color scheme. Fixed more incosistent layout issues (floated content div making content expand outside of its container).

= 1.0 January 15 2016 =
JGD-BizElite has been revised enough to warrant a new version (1.0).
Placed desktop layout styles inside of media queries for a responsive and fixed sidebar design for each of the layouts. Switched all theme options to use the Customizer, eliminating the jbe-options.php admin page. Eliminated the "Custom HTML" feature for the theme; this will be created as a plugin which I am working on. Added "up to top" and "down to bottom" buttons for tablet/mobile screen widths that scroll up to the top of the page and the sidebar (at the bottom), respectively.

= 0.2.1 December 05 2014 =
Updated header title to newer standard using a filter for specific pages. Changed tag displayed in Administration panel description.

= 0.2 October 28 to October 29 2013 =
Updated the custom header to be compatible with WordPress 3.4 by using add_theme_support('custom-header').
Updated the custom background (color) to be compatible with WordPress 3.4 by using add_theme_support('custom-background').
Changed the Recent Posts default widget to use a WP_Query object, rather than query_posts() (this saves on http requests).
Placed the widgetized sidebars inside of functions, as described on the Widgetizing Themes page (http://codex.wordpress.org/Widgetizing_Themes).
Added the script fluidVideo.js that shrinks and expands a video to the size of its parent container.
A new screenshot was added.

== About the Screenshot ==

Screenshot and Header image: The default image included behind the header (waves-bg-large.png) and the JGD-BizElite logo (jgd-bizelite-logo.png) is included with the theme and is licensed under the Creative Commons Attribution-Sharealike 4.0 license (CC-BY-SA 4.0). The images can be found in this theme's images folder.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now
3. Click Activate to use your new theme right away
