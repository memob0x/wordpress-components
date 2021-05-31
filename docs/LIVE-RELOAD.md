
```javascript
(document.querySelectorAll('[data-component="example-component"]') || []).forEach(el => {
    // every [data-component="example-component"] element mount...
});
```

```css
[data-component="example-component"] {
    /* all [data-component="example-component"] elements style... */
}
```
