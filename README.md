# Discourse plugin for Craft CMS


## Installation

To install Craft-Discourse, follow these steps:

1. Download & unzip the file and place the `discourse` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/r-ninja/craft-discourse.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `discourse` for Craft to see it.  

Discourse works on Craft 2.4.x and above

## Overview

This plugin is intended to use your Craft website authentification system for Discourse.

This plugin use "Discourse Single-Sign-On Helper for PHP" ([cviebrock/discourse-php](https://packagist.org/packages/cviebrock/discourse-php)), a PHP class for helping with Discourse's SSO login.

## Configuration

In Discourse (Admin/Settings):
* set "enable SSO" to true
* set "SSO url" to: http://example.com/actions/discourse/sso (replace example.com by your own domain)
* set "SSO secret" to any secure/random value
* set "SSO overrides email" to true
* set "SSO overrides username" to true
* set "SSO overrides name" to true

In plugin settings
* set the Discourse URL (without trailing slash!)
* set SSO secret to the same value in your Discourse settings
* Save and enjoy!

## Usage

Once configured, you should be logged in Discourse with the same user than Craft. Nothing more to do.

## Roadmap

Some things to do, and ideas for potential features:

* Sync avatar with "SSO overrides avatar"

## Changelog

### 1.0.0 -- 2016.04.16

* Initial release

Brought to you by [Richard Trudel](http://trudel.ninja)
