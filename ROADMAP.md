# 0.1.0
    [ ] css critical in head before <link> elements
        <style> (contents of component.critical.css)
    [ ] css async in head after critical <style> elements
        <link rel="stylesheet" href="component.css">
        +
        <link rel="preload" href="component.async.css" as="style" onload="this.rel='stylesheet'">
        +
        <link rel="stylesheet" href="component.async.css">
    [ ] js modules/nomodules in footer
        <script src="component.js">
        +
        <script type="module" src="component.esm.js">
        +
        <script nomodule src="component.nomodule.js">
    [ ] api routes for existent components returns resources urls
        http://localhost/wp-json/wcpt/v1/components/app-foobar
        {
            "css": "https://",
            "css-async": null,
            "css-critical": null,
            "js": null,
            "js-esm": null,
            "js-nomodule": null
        }

# 0.1.1
    [ ] wp hook to change components directory
    [ ] wp hook to change components resources inclusion priority
    [ ] wp hook to change components resources inclusion location (for scripts)
