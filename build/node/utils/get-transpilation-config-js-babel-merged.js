export default (...args) => {
    const { length } = args;

    let config = {};

    for( let i = 0; i < length; i++){
        const presets = config.presets || [];
        const plugins = config.plugins || [];

        const newConfig = args[i] || {};

        const newPresets = newConfig.presets || [];
        const newPlugins = newConfig.plugins || [];

        config = {
            ...newConfig,

            presets: [
                ...presets,

                ...newPresets
            ],

            plugins: [
                ...plugins,

                ...newPlugins
            ]
        };
    }

    return config;
};
