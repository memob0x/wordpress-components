# Wordpress Components

Don't give up on code-splitting and logic encapsulation when working on server-side rendered WordPress.

Wordpress Components is a [WordPress](https://wordpress.com/it) [plugin](https://wordpress.org/support/article/managing-plugins/) that aims to automate css and js resources inclusion, as a consequence, it naturally enhances code splitting and paves the way for [web components](https://developer.mozilla.org/en-US/docs/Web/Web_Components) integration.

The plugin also adds a basic support for critical css, js modules (esm) and lazy css to WordPress.

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
All components scripts are rendered before the `body` closing tag.

* **example-component.js**: render-blocking resource.
* **example-component.esm.js**: deferred [`type="module"` (esm) resource](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Modules).
* **example-component.nomodule.js**: render-blocking [`nomodule` (**esm fallback**) resource](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#attr-nomodule).

## Styles
All the components styles are rendered before the `head` closing tag.

* **example-component.css**: render-blocking resource.
* **example-component.critical.css**: render-blocking `style` tag.
* **example-component.lazy.css**: lazy `data-href` resource, it needs to be loaded programmatically with js.

## REST
The plugin also enables the following endpoints:
* **wp-json/wpcs/v1/components**: returns the list of all components names.
    ```json
    [
        "example-component",
        "other-component",
        "foo-bar"
    ]
    ```
* **wp-json/wpcs/v1/components/example-component**: returns all the informations related to a given component.
    ```json
    {
        "name": "example-component",
        "js": "path/to/components/example-component/example-component.js",
        "js-esm": "path/to/components/example-component/example-component.esm.js",
        "js-nomodule": "path/to/components/example-component/example-component.nomodule.js",
        "css": "path/to/components/example-component/example-component.css",
        "css-critical": "path/to/components/example-component/example-component.critical.css",
        "css-lazy": "path/to/components/example-component/example-component.lazy.css"
    }
    ```

## Implementation Concept

* [Live demo](https://f93pc.sse.codesandbox.io) -  A basic hot-reload component-based front-end integration written in vanilla js based on this plugin specifications.
