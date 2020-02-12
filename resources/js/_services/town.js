// import config from 'config';
import {auth_header} from '../_helpers';

const baseURL = "http://127.0.0.1:8085/api";

export const userService = {
    getAll,

};

function getAll() {
    const requestOptions = {
        method: 'GET',
        // headers: authHeader()
        mode: 'no-cors'
    };

    return fetch(baseURL + '/towns', requestOptions).then(handleResponse);
}

function handleResponse(response) {
    return response.text().then(text => {
        const data = text && JSON.parse(text);
        if (!response.ok) {
            if (response.status === 401) {
                // auto logout if 401 response returned from api
                logout();
                location.reload(true);
            }

            const error = (data && data.message) || response.statusText;
            return Promise.reject(error);
        }
        return data;
    });
}
