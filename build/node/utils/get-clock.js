export default start => {
    if (!start) {
        return Date.now();
    }

    return Date.now() - start;
};
