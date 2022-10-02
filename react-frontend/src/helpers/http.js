import axios from 'axios';

const http = axios.create({
    baseURL: 'http://captgym.local/api'
});

http.defaults.headers.post['Content-Type'] = 'application/json';

export default http;