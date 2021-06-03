# Wordpress Components

Wordpress Components is a [WordPress](https://wordpress.com/it) plugin that aims to automate css and js resources inclusion in a WordPress server-side-rendered installation, as a consequence it naturally enhances code splitting and paves the way for [web components](https://developer.mozilla.org/en-US/docs/Web/Web_Components) integration.

The plugin also adds a basic support for critical css, js modules (esm) and lazy css.

Rendering the following element...
```html
<div data-component="example-component">
    I'm an example component
</div>
```

...will result in the inclusion of the following resources (if present, none of them is mandatory):

* your-theme-folder/components/example-component/**example-component.js**
* your-theme-folder/components/example-component/**example-component.esm.js**
* your-theme-folder/components/example-component/**example-component.nomodule.js**
* your-theme-folder/components/example-component/**example-component.css**
* your-theme-folder/components/example-component/**example-component.critical.css**
* your-theme-folder/components/example-component/**example-component.lazy.css**

## Scripts
All rendered before the `body` closing tag.

* **example-component.js**: render-blocking resource.
* **example-component.esm.js**: deferred [`type="module"` (esm) resource](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Modules).
* **example-component.nomodule.js**: render-blocking [`nomodule` (**esm fallback**) resource](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#attr-nomodule).

## Styles
All rendered before the `head` closing tag.

* **example-component.css**: render-blocking resource.
* **example-component.critical.css**: render-blocking `style` tag.
* **example-component.lazy.css**: lazy `data-href` resource, it needs to be loaded programmatically with js.

## Implementation Concept

* [live demo](#): A really simple hot-reload component-based fe integration written in vanilla js based on this plugin specifications
