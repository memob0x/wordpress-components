# Wordpress Components

Don't give up on code-splitting and logic encapsulation when working on server-side rendered WordPress.

Wordpress Components is a [WordPress](https://wordpress.com/it) [plugin](https://wordpress.org/support/article/managing-plugins/) that aims to automate css and js resources inclusion, as a consequence, it naturally enhances code splitting and paves the way for [web components](https://developer.mozilla.org/en-US/docs/Web/Web_Components) integration.

The plugin also adds a basic support for critical css, js modules (esm) and lazy css to WordPress.

Rendering the following element...
```html
<div data-component-ur-component-name="{ maybe-some-js-props: [1,2,3] }">
    I'm an example component
</div>
```

...will result in the inclusion of the following resources (if present, none of them is mandatory):

* your-theme-folder/components/ur-component-name/**ur-component-name.js**
* your-theme-folder/components/ur-component-name/**ur-component-name.esm.js**
* your-theme-folder/components/ur-component-name/**ur-component-name.nomodule.js**
* your-theme-folder/components/ur-component-name/**ur-component-name.css**
* your-theme-folder/components/ur-component-name/**ur-component-name.critical.css**
* your-theme-folder/components/ur-component-name/**ur-component-name.lazy.css**

## Scripts
All components scripts are rendered before the `body` closing tag.

* **ur-component-name.js**: render-blocking resource.
* **ur-component-name.esm.js**: deferred [`type="module"` (esm) resource](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Modules).
* **ur-component-name.nomodule.js**: render-blocking [`nomodule` (**esm fallback**) resource](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#attr-nomodule).

## Styles
All the components styles are rendered before the `head` closing tag.

* **ur-component-name.css**: render-blocking resource.
* **ur-component-name.critical.css**: render-blocking `style` tag.
* **ur-component-name.lazy.css**: lazy `data-href` resource, it needs to be loaded programmatically with js.

## REST
The plugin also enables the following endpoints:
* **wp-json/wpcs/v1/components**: returns the list of all components names.
    ```json
    [
        "ur-component-name",
        "other-component",
        "foo-bar"
    ]
    ```
* **wp-json/wpcs/v1/components/ur-component-name**: returns all the informations related to a given component.
    ```json
    {
        "name": "ur-component-name",
        "uri": "https://path/to/components/ur-component-name/",
        "js": [
            "https://path/to/components/ur-component-name/ur-component-name.esm.js",
            "https://path/to/components/ur-component-name/ur-component-name.any.kind.of.suffix.js",
        ],
        "css": [
            "https://path/to/components/ur-component-name/ur-component-name.css",
            "https://path/to/components/ur-component-name/ur-component-name.any.kind.of.suffix.css"
        ]
    }
    ```
