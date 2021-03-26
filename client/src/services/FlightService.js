import ApiService from './ApiService';

class FlightService extends ApiService {
  async search({ start, end }) {
    const { data } = await this.client.get(`search/${start}/${end}`);
    return data;
  }
}

export default new FlightService();
