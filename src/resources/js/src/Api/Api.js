// // import Axios from '../axios';

// export default class Api {
//     static get STATUS_CODE_INTERNAL_ERROR() {
//         return 500;
//     }

//     static get STATUS_CODE_NOT_FOUND_ERROR() {
//         return 404;
//     }

//     static get STATUS_CODE_VALIDATION_ERROR() {
//         return 422;
//     }

//     static get STATUS_CODE_BAD_REQUEST_ERROR() {
//         return 400;
//     }

//     static get STATUS_CODE_FORBIDDEN_ERROR() {
//         return 403;
//     }

//     static get STATUS_CODE_NO_CONTENT_ERROR() {
//         return 204;
//     }

//     get module() {
//         return this._module;
//     }

//     constructor(module) {
//         this._module = module;
//     }

//     static fullUrl(url) {
//         return encodeURI(process.env.TODO_LIST_HOST + url);
//     }
// }
import Axios from '../../Axios';

export default class Api {
    get errorMessages() {
        return this._errorMessage !== undefined ? this._errorMessage : [];
    }

    get exceptionMessage() {
        return this._exceptionMessage !== undefined ? this._exceptionMessage : '';
    }

    set errors(value) {
        this._errors.push(value);
    }

    get errors() {
        return this._errors;
    }

    /**
     * これを採用したい
     * @returns {Error}
     */
    get error() {
        return this._error;
    }

    constructor() {
        this._api = new Axios();
        this._errors = [];
        this._error = new Error();
        this._error.errors = [];
        this._error.exceptionMessage = '';
    }

    judgeErrorByResponseStatus(response) {
        this._error = new Error();
        this._error.errors = [];
        this._error.exceptionMessage = '';
        this._errors = [];
        if (response.status >= 200 && response.status < 400) {
            return true;
        } else if (response.status === 422) {
            this._errorMessage = response.data.errors;
            Object.keys(response.data.errors).forEach((key) => {
                this.errors = response.data.errors[key];
            });
            this._error.errors = response.data.errors;
            return false;
        } else {
            this._exceptionMessage = response.data ? response.data.message : 'サーバーエラーが発生しました。';
            this.errors = response.message
                ? response.message
                : response.data.message
                    ? response.data.message
                    : 'サーバーエラーが発生しました。';
            this._error.exceptionMessage = response.message
                ? response.message
                : response.data.message
                    ? response.data.message
                    : 'サーバーエラーが発生しました。';
            return false;
        }
    }

}
