theme-wbl

# Composer dependancies

## WPTT/webfont-loader

Downloads webfonts (like for example Google-Fonts), and hosts them locally on a WordPress site.

This improves performance (fewer requests to multiple top-level domains) and increases privacy. Since fonts get hosted locally on the site, there are no pings to a 3rd-party server to get the webfonts and therefore no tracking.

@link https://github.com/WPTT/webfont-loader
@link https://make.wordpress.org/themes/2020/09/25/new-package-to-allow-locally-hosting-webfonts/

# Developer notes

## Remarkable remarks

- **Fix editor block layout**: There is a max-width of 840px added to .wp-block in the editor. We disable this through an inline script in assets.php. We can't use editor-style.css because this adds to much specificity. Note: could this 840 be linked to the magical 'content-width'?