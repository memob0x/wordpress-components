# Wordpress Components

Wordpress Components is a [WordPress](https://wordpress.com/it) plugin that aims to enhance [web components](https://developer.mozilla.org/en-US/docs/Web/Web_Components) integration on WordPress server-side-rendered websites.

After its installation it is possible to define js and css files in the components folder in the root of the theme used, decreeing their automatic inclusion when a component of the same name as `data-component` attribute value is rendered.

The plugin also adds a basic support for asynchronous js and css files in wordpress, through type="module" and nomodule script tag attributes and rel="preload" link attribute, along with critical stylesheets.

## How-to
The following component render...
```html
<div data-component="example-component">
    I'm an example component
</div>
```

...would cause the following resources to be enqueued (if present):

* _your-theme-folder/components/example-component/**example-component.js**_
* _your-theme-folder/components/example-component/**example-component.esm.js**_
* _your-theme-folder/components/example-component/**example-component.nomodule.js**_
* _your-theme-folder/components/example-component/**example-component.css**_
* _your-theme-folder/components/example-component/**example-component.async.css**_
* _your-theme-folder/components/example-component/**example-component.critical.css**_

## Scripts
* **example-component.js**: is included before the `body` closing tag as a _classic_ `script` tag
* **example-component.esm.js**: is included before the `body` closing tag as `script` tag with `module` _type_ attribute
* **example-component.nomodule.js**: is included before the `body` closing tag as a `script` tag with `nomodule` attribute for browsers that don't support esm module

## Styles
* **example-component.css**: is included in `head` as a classic `link` tag
* **example-component.async.css**: is included in `head` twice: as a `link` tag with [_rel_=`preload` attribute along with an onload event](https://www.filamentgroup.com/lab/async-css.html#a-modern-approach), and as a classic `link` tag as a fallback for browsers that don't support the forsaid preload attribute
* **example-component.critical.css**: its content is included in `head` in a `style` tag

## Implementation Examples

* [Live reload](docs/LIVE-RELOAD.md)
* [Hot reload](docs/HOT-RELOAD.md)
