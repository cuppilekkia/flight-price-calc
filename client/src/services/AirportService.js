import ApiService from './ApiService';

class AirportService extends ApiService {
  async getAirports() {
    const { data } = await this.client.get('airports');
    return data;
  }
}

export default new AirportService();
