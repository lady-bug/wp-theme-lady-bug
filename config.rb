#enable sass in rails
gem "sass"
#root level target path
http_path = "/"
#targets default style.css file at the root level of the theme
css_dir = "."
#targets sass directory
sass_dir = "assets/sass"
#targets images
images_dir = "assets/img"
#targets javasripts
javascripts_dir = "assets/js"
#targets fonts
fonts_dir = "assets/fonts"
 
# output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
# :nested during developement
# :compressed during production
output_style = :nested
 
# Enable relative paths to assets via compass helper functions.
# note: this is important in wordpress themes for sprites
relative_assets = true