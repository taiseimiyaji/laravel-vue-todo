import axios from 'axios';

export default class Axios {

    constructor(headers = null) {
        this.header = headers;
    }

    get header() {
        return this._header;
    }

    set header(config) {
        this._header = config !== null ? config : { 'X-Requested-With': 'XMLHttpRequest' };
    }

    async send(method, url, params = {}) {
        const config = {
            method: null,
            url: url,
            headers: this.header,
            data: null,
            params: null,
        };

        switch (method.toLowerCase()) {
            case 'get':
                config.method = 'get';
                config.data = params;
                break;
            case 'post':
                config.method = 'post';
                config.data = params;
                break;
            case 'put':
                config.method = 'post'
                if (typeof params.append === 'function') {
                    params.append('_method', 'PUT');
                } else {
                    params['_method'] = 'PUT';
                }
                config.data = params;
                break;
            case 'delete':
                config.method = 'post';
                if (typeof params.append === 'function') {
                    params.append('_method', 'DELETE');
                } else {
                    params['_method'] = 'DELETE';
                }
                config.data = params;
                break;
            default:
                console.error('Unknown method.');
                throw 'Unknown method.';
        }

        const onSuccess = (res) => {
            return Promise.resolve(res);
        };

        const onError = (err) => {
            return err.response;
        };

        return await axios(config).then(onSuccess).catch(onError);
    }
}