import axios from 'axios'

class UpdateSort {
  async process(task) {
    return await axios.post("http://localhost:8081/api/task/sort", task);
  }
}
export default UpdateSort;
