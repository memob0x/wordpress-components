import getComponentsMember from './get-components-member.js';

// TODO: maybe include Vue (code-split) instead
export default (el, componentsConfigs, data) => new window.Vue({
    components: getComponentsMember(componentsConfigs),

    data,

    el
});
