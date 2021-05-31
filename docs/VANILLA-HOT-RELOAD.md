```javascript
(async () => {
    const availablesComponents = []; // TODO: fetch json

    const getComponentName = el => el?.dataset?.component || '';

    const componentExists = name => availablesComponents.includes(name);

    const loadComponent = async el => {
        const name = getComponentName(el);

        if( componentExists(name) ){
            const data = await `//${name}.json`; // TODO: fetch json

            return {
                data,

                proto: await import(data['js-esm'])
            };
        }

        return null;
    }

    const mountComponent = async el => {
        const vm = await loadComponent(el);

        vm.el = el;

        proto.mount.call(vm, vm);
    }

    const destroyComponent = async el => {
        const vm = await loadComponent(el);

        vm.el = el;

        proto.destroy.call(vm, vm);
    }

    const filterComponents = els => (els || []).filter(x => x.matches('[data-component]'));

    new MutationObserver(mutations => mutations.forEach(mutation => {
        filterComponents(mutation.addedNodes).forEach(loadComponent);

        filterComponents(mutation.removedNodes).forEach(destroyComponent);
    })).observe(document.body, {
        attributes: false,
        childList: true,
    });

    document.body.querySelector('[data-component]').forEach(loadComponent);
}):
```

```javascript
export default styles => {
    // load css async
};
```

```javascript
import loadComponentStyles from 'load-component-styles';

export default {
    mount: function(vm) {
        console.log('component is mounted', this, 'same as', vm);

        loadComponentStyles([
            vm.data['css-critical'],
            vm.data['css-lazy'],
            vm.data['css']
        ]);
    },

    destroy: function(vm) {
        console.log('component is destoryed', this, 'same as', vm);
    }
};
```

```css
[data-component="example-component"] {
    line-height: 1;
}
```
