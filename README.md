# Basic WP theme and plugin demo

Just another basic wordpress theme and plugin

### Last Word plugin

- Displays a random line from plan 9's 
[fortunes](https://github.com/0intro/plan9/blob/7524062cfa4689019a4ed6fc22500ec209522ef0/sys/games/lib/fortunes) 
file after the post content

- Can also be triggered elsewhere by using a shortcode ['my-last-word']

- Is relatively well written

### My-theme theme

- Creates an about and a welcome page

- Sets the welcome page as a static home page

- Should have all basic theme files needed for fulfilling the wordpress template hierarchy

- Is relatively ugly at the moment (needs styling)

## Installation


### The Docker (compose) way

- clone the repo 

`git clone https://github.com/djleven/wp_basic.git`

- navigate to directory

`cd wp_basic`

- run docker compose

`docker-compose up -d`

- navigate to localhost on your browser

- perform the GUI WP installation (only done the first time)

Note: For more info on this Docker/WP setup check out this
[repo](https://github.com/nezhar/wordpress-docker-compose)

### Manually

- download the zip 

- install the two folders found in `wp-dev` to your `plugins` and `themes`
folders of your wordpress installation respectively


## Activation

- Activate the plugin and theme in your wp admin backend


