import ncp from 'ncp';

export default (path, dest, name) =>
    new Promise((resolve, reject) => ncp(path, dest + '/' + name, { clobber: true }, err => {
        if (err) {
            reject(err);
        }

        resolve();
    }));
