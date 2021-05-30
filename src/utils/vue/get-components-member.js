export default componentsConfigs => {
    const components = {};

    const { length } = componentsConfigs || [];

    for (let i = 0; i < length; i++) {
        const { name, url } = componentsConfigs[i] || {};

        if( !name || !url ){
            continue;
        }

        components[name] = async () => {
            const module = await import(url);

            return module.default;
        };
    }

    return components;
};
