import axios from 'axios';

class GetTaskById {
  async process(id) {
    return await axios.get('http://localhost:8081/api/task/' + id);
  }
}
export default GetTaskById;
