import assign from '../object/assign.js';

const selector = 'data-pjax-state';

export default (parent, pjax) => {
    const triggers = assign([], parent.querySelectorAll('['+selector+']'));

    for (let i = 0; i < triggers.length; i++) {
        triggers[i].removeAttribute(selector);
    }

    pjax.refresh();
};
