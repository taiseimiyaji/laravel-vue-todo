import axios from 'axios';

class GetAllStatus {
  constructor (module) {
    this.module = module;
  }
  async process() {
    return await axios.get("http://localhost:8081/api/status");
  }
}

export default GetAllStatus;
