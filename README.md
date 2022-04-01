# Wordpress Components

Don't give up on code-splitting and logic encapsulation when working on server-side rendered WordPress.

Wordpress Components is a [WordPress](https://wordpress.com/it) [plugin](https://wordpress.org/support/article/managing-plugins/) that aims to automate css and js resources inclusion, as a consequence, it naturally enhances code splitting and paves the way for [web components](https://developer.mozilla.org/en-US/docs/Web/Web_Components) integration.

The plugin also adds a basic support for critical css, js modules (esm) and lazy css to WordPress.

Rendering the following element...

```html
<div data-component-foobar>I'm an example component</div>
```

...will result in the inclusion of the following resources (if present, none of them is mandatory):

-   your-theme-folder/components/foobar/**foobar.js**
-   your-theme-folder/components/foobar/**foobar.esm.js**
-   your-theme-folder/components/foobar/**foobar.nomodule.js**
-   your-theme-folder/components/foobar/**foobar.css**
-   your-theme-folder/components/foobar/**foobar.critical.css**
-   your-theme-folder/components/foobar/**foobar.lazy.css**

## Scripts

All components scripts are rendered before the `body` closing tag.

-   **foobar.js**: render-blocking resource.
-   **foobar.esm.js**: deferred [`type="module"` (esm) resource](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Modules).
-   **foobar.nomodule.js**: render-blocking [`nomodule` (**esm fallback**) resource](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script#attr-nomodule).

## Styles

All the components styles are rendered before the `head` closing tag.

-   **foobar.css**: render-blocking resource.
-   **foobar.critical.css**: render-blocking `style` tag.
-   **foobar.lazy.css**: lazy `data-href` resource, it needs to be loaded programmatically with js.

## REST

The plugin also enables the following endpoints:

-   **wp-json/wpcs/v1/components**: returns the list of all components names.
    ```json
    ["foobar", "other-component", "bizz-bazz"]
    ```
-   **wp-json/wpcs/v1/components/foobar**: returns all the informations related to a given component.
    ```json
    {
        "name": "foobar",
        "uri": "https://path/to/components/foobar/",
        "js": [
            "https://path/to/components/foobar/foobar.esm.js",
            "https://path/to/components/foobar/foobar.any.kind.of.suffix.js"
        ],
        "css": [
            "https://path/to/components/foobar/foobar.css",
            "https://path/to/components/foobar/foobar.any.kind.of.suffix.css"
        ]
    }
    ```

## Tips

More than one components can be attached to one DOM node, this can be useful to compose complex components keeping separated logic and styles.

```html
<div data-component-one data-component-two>Composed item</div>

<style>
    [data-component-one] {
        /* some "component-one" style */
    }

    [data-component-two] {
        /* some "component-two" style */
    }
</style>

<script>
    document.querySelectorAll("[data-component-one]").forEach((x) => {
        // some "component-one" logic
    });

    document.querySelectorAll("[data-component-two]").forEach((x) => {
        // some "component-two" logic
    });
</script>
```

One benefit of using data attributes to identify components is that every instance can have its very own "data" object.

```html
<div data-component-with-props="{ some: { props: {} } }">Composed item</div>

<script>
    document
        .querySelectorAll("[data-component-with-props]")
        .forEach((component) => {
            const props = JSON.parse(
                component.getAttribute("data-component-with-props")
            );

            console.log(component, props);
        });
</script>
```
