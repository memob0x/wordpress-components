export default (code/*, dist*/) => {
    // TODO: replace vue, vuex, pjax, core-js, regenerator-runtime inclusion from parent theme

    // const prefix = dist.split('/').map(() => '..').join('/');

    // code = code.replace(/core-js\/(.*?)\.js/g, match => prefix + '/vue-wp-parent-theme/dist/globals/' + match);

    // code = code.replace(/regenerator-runtime\/(.*?)\.js/g, match => prefix + '/vue-wp-parent-theme/dist/globals/' + match);

    return code;
};
