theme-wbl

# Open Source Theme Development
We strive for openness. So we open source this theme. These are our first steps in open sourcing our code. Bare with us :) 

The code is by no means finished. It's a work in progress.

# Composer dependancies

## WPTT/webfont-loader

Downloads webfonts (like for example Google-Fonts), and hosts them locally on a WordPress site.

This improves performance (fewer requests to multiple top-level domains) and increases privacy. Since fonts get hosted locally on the site, there are no pings to a 3rd-party server to get the webfonts and therefore no tracking.

@link https://github.com/WPTT/webfont-loader
@link https://make.wordpress.org/themes/2020/09/25/new-package-to-allow-locally-hosting-webfonts/

# Developer notes

## Color naming
For colors we choose to use the following naming structure: 

- primary
- secondary
- tertiary 
- neutral

The reason for this is that the naming is exposed to the HTML through classes like `has-primary-color` and `has-secondary-background-color`. When we change the colors we don't want to change the classnames which are saved to the database.

To add subtilities to the colors we can use a palette (from light to dark):

- primary-50
- primary-100
- primary-200
- primary-300
- primary-400
- primary-500
- primary-600
- primary-700
- primary-800
- primary-900

## Remarkable remarks

- **Fix editor block layout**: There is a max-width of 840px added to .wp-block in the editor. We disable this through an inline script in assets.php. We can't use editor-style.css because this adds to much specificity. Note: could this 840 be linked to the magical 'content-width'?