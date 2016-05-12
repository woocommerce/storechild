## Storechild

Child theme starter for [Storefront](https://www.woothemes.com/storefront/).

---

The following things are configured in the child theme:

* Script loading
* Frontend JavaScript detection
* Default values / Initial configuration of Storechild and it's integrations with the Storefront Extensions.
* Child theme Javascript file

### Default Storefront and Extension values

Storechild filters `storefront_setting_default_values` to set some defaults for you in the customizer. See `Storechild_Customizer::storechild_defaults()` and use it as an example to set defaults for any settings you want
to change.

### Grunt
Storechild uses [Grunt](http://gruntjs.com/) to fulfill various tasks such as;

* Sass compilation into CSS
* RTL CSS generation
* Javascript minification + linting
* .pot file generation

This can all be done automatically using the `watch` task. `cd` into the `storechild` directory in terminal then run
`grunt watch`. This will monitor the files in the theme and compile / minify etc as and when they're modified. Remember
to install the project dependencies first with `npm install`.

#### New to Grunt?
There's a great getting started guide on the [Grunt web site](http://gruntjs.com/getting-started). You will also need
install [Node](https://nodejs.org/) if you haven't already. There's information on how to do that [here](https://docs.npmjs.com/getting-started/installing-node).