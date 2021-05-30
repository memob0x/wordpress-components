# 0.1.0
    [ ] css critical in head before <link> elements
        <style>
    [ ] css async in head after critical <style> elements
        <link rel="preload" href="mystyles.css" as="style" onload="this.rel='stylesheet'">
        <link rel="stylesheet" href="style.css">
    [ ] js modules/nomodules in footer
        <script type="module">
        <script nomodule>
    [ ] api routes for existent components returns resources urls
        http://localhost/wp-json/wcpt/v1/components/app-foobar
        {
            "css": "",
            "css-critical": "",
            "js": "",
            "js-esm": "",
            "js-nomodule": ""
        }

# 0.1.1
    [ ] wp hook to change components directory
    [ ] wp hook to change components resources inclusion priority
    [ ] wp hook to change components resources inclusion location (for scripts)
