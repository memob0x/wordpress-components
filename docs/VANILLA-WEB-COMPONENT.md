```javascript
class ExampleComponent extends HTMLElement {
    static get observedAttributes() {
        return ['data-foo', 'data-bar'];
    }

    constructor() {
        super();

        const shadow = this.attachShadow({ mode: 'open' });

        const div = document.createElement('div');
        const style = document.createElement('style');

        shadow.appendChild(style);
        shadow.appendChild(div);
    }

    connectedCallback() {
        updateStyle(this);

        // mounted
    }

    disconnectedCallback() {
        // destroyed
    }

    adoptedCallback() {
        // passed as argument of adoptNode method call, see https://developer.mozilla.org/en-US/docs/Web/API/Document/adoptNode
    }

    attributeChangedCallback(name, oldValue, newValue) {
        updateStyle(this);

        // updated
    }
};

function updateStyle(elem) {
    const shadow = elem.shadowRoot;

    shadow.querySelector('style').textContent = `
        div {
            line-height: 1;
        }
    `;
};
```
