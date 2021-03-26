import axios from 'axios';

export default class ApiService {
  constructor() {
    this.client = axios.create({
      baseURL: 'http://localhost:8080',
    });
  }
}
