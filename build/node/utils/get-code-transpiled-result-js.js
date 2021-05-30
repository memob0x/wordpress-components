import babel from '@babel/core';

export default async (content, options = {}) => await babel.transformAsync(content, {
    ...options,

    compact: true,
    comments: false
});
