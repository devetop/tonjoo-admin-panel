import axios from 'axios';
import { buildMemoryStorage, setupCache } from 'axios-cache-interceptor';

let headers = {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
}
if (process.env.NEXT_PUBLIC_APPLICATION_TOKEN_WEB) {
    headers['Authorization'] = 'Bearer ' + process.env.NEXT_PUBLIC_APPLICATION_TOKEN_WEB;
}
const cacheConfig = {
    storage: buildMemoryStorage(true, 300000, false),
    ttl: 300000,
    methods: ['get']
};

let _serverApi = axios.create({
    baseURL: process.env.NEXT_PUBLIC_FRONTEND_CMS_SERVER_API_BASE_URL || 'http://127.0.0.1:8000/api',
    headers
});
if (process.env.NEXT_PUBLIC_API_CACHE) {
    _serverApi = setupCache(_serverApi, cacheConfig);
}
export const serverApi = _serverApi;

let _clientApi = axios.create({
    baseURL: process.env.NEXT_PUBLIC_FRONTEND_CMS_CLIENT_API_BASE_URL || 'http://127.0.0.1:8000/api',
    headers
});
if (process.env.NEXT_PUBLIC_API_CACHE) {
    _clientApi = setupCache(_clientApi, cacheConfig);
}
export const clientApi = _clientApi;